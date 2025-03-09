<template>
    <p v-if="error && !loading" class="text-center text-red-500 text-xs">
        {{ error }}
    </p>
    <q-select
        v-else
        v-model="value"
        :option-label="optionLabel"
        :option-value="optionValue"
        :options="options"
        :loading="loading"
        dense
        outlined
        :label="label"
        :input-debounce="serverSearchAble ? 300 : 0"
        :multiple="multiple ?? false"
        :use-chips="multiple ?? false"
        :error-message="errorMessage?.replaceAll('_', ' ')"
        :error="!!errorMessage"
        use-input
        @filter="filterFn"
        options-dense
        @update:model-value="
            data => {
                if (data === null && this.multiple) {
                    onChange([])
                } else {
                    onChange(data)
                }
            }
        "
        :clearable="true"
    >
        <template v-slot:no-option>
            <q-item>
                <q-item-section class="text-grey"> No results </q-item-section>
            </q-item>
        </template>
    </q-select>
</template>
<script>
import { defineComponent, ref, watch } from 'vue'
import { resolve } from 'src/lib/helpers'
import { useGeneralStore } from 'stores/generalStore'
import * as url from 'node:url'

export default defineComponent({
    setup() {
        const generalStore = useGeneralStore()
        const revalidateValue = ref(null)
        watch(
            () => generalStore.table,
            newValue => (revalidateValue.value = newValue),
        )
        const setRevalidateValue = value => {
            revalidateValue.value = value
            generalStore.revalidate(value)
        }
        return {
            revalidateValue,
            setRevalidateValue,
        }
    },
    props: [
        'url',
        'multiple',
        'defaultValue',
        'onChange',
        'label',
        'errorMessage',
        'optionLabel',
        'optionValue',
        'createdAble',
        'id',
        'fromResource',
        'clearAfterSelect',
        'onLoadingChanged',
        'disabled',
        'className',
        'icon',
        'findFromId',
        'onCreate',
        'selectId',
        'serverSearchAble',
    ],
    data() {
        return {
            loading: true,
            options: [],
            error: null,
            value: null,
            options_copy: [],
        }
    },
    methods: {
        async fetchData(query = null) {
            this.loading = true
            try {
                let api = this.url
                if (query !== null) {
                    api += '&query=' + query
                }
                const result = await this.$api.get(api)
                if (this.fromResource) {
                    this.options = result.data.data
                    this.options_copy = result.data.data
                } else {
                    this.options = result.data
                    this.options_copy = result.data
                }
                if (this.defaultValue) {
                    if (this.multiple) {
                        const findSearchIndexes = []
                        this.defaultValue.map(item => {
                            const findSearchIndex = this.options.findIndex(
                                obj => resolve(this.optionValue, obj) === item,
                            )
                            if (findSearchIndex !== -1) {
                                findSearchIndexes.push(findSearchIndex)
                            }
                        })
                        const findOptions = []
                        if (findSearchIndexes.length > 0) {
                            findSearchIndexes.map(itemIndex => {
                                findOptions.push(this.options[itemIndex])
                            })
                        }
                        if (findOptions.length > 0) {
                            this.value = findOptions
                            this.onChange(findOptions)
                        }
                    } else {
                        const findSearchIndex = this.options.findIndex(
                            obj =>
                                resolve(this.optionValue, obj) ===
                                this.defaultValue,
                        )
                        if (findSearchIndex !== -1) {
                            this.value = this.options[findSearchIndex]
                            this.onChange(this.options[findSearchIndex])
                        }
                    }
                }
            } catch (err) {
                this.error = err?.response?.data?.message
            } finally {
                this.loading = false
            }
        },
        filterFn(val, update) {
            if (val === '') {
                update(() => {
                    this.options = this.options_copy
                })
                if (this.serverSearchAble) {
                    this.fetchData(null)
                }
                return
            } else {
                const newValue = val.toLowerCase()
                const filteredOptions =
                    this.options_copy?.filter(item =>
                        resolve(this.optionLabel, item)
                            .toLowerCase()
                            .includes(newValue),
                    ) || []
                update(
                    () => {
                        this.options = filteredOptions.map(item => ({
                            ...item,
                            label: resolve(this.optionLabel, item),
                            value: resolve(this.optionValue, item),
                        }))
                    },
                    ref => {
                        if (
                            val !== '' &&
                            ref.options.length > 0 &&
                            ref.getOptionIndex() === -1
                        ) {
                            ref.moveOptionSelection(1, true)
                            ref.toggleOption(ref.options[ref.optionIndex], true)
                        }
                    },
                )
                if (this.serverSearchAble) {
                    this.fetchData(newValue)
                }
            }
        },
    },
    mounted() {
        this.fetchData()
    },
    watch: {
        revalidateValue(newValue) {
            if (newValue) {
                this.fetchData().finally(() => {
                    this.setRevalidateValue(null)
                })
            }
        },
        url(newValue, oldData) {
            if (newValue !== oldData) {
                this.fetchData()
            }
        },
    },
})
</script>
