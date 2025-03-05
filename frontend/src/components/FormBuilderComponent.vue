<template>
    <div>
        <validation-form
            :validation-schema="validationSchema"
            @submit="onSubmit"
            :class="className"
            v-slot="{ values }"
        >
            <template v-for="field in visibleFields(values)" :key="field.name">
                <field
                    :name="field.name"
                    :value="field.value"
                    v-slot="{ errorMessage, value, field: formField }"
                >
                    <div :class="field?.className">
                        <q-input
                            v-if="['text', 'number'].includes(field.type)"
                            :model-value="value"
                            :error="!!errorMessage"
                            v-bind="formField"
                            outlined
                            :disable="field?.disable ?? false"
                            dense
                            :label="$translate(field.label)"
                            :type="field?.type ?? 'text'"
                            :error-message="errorMessage?.replaceAll('_', ' ')"
                            :mask="field?.mask"
                            :hint="field?.hint"
                        >
                            <template v-slot:prepend>
                                <q-icon
                                    v-if="field?.prepend_icon"
                                    :name="field?.prepend_icon"
                                />
                            </template>
                        </q-input>

                        <div v-else-if="field?.type === 'datepicker'">
                            <datepicker-component
                                :label="field.label"
                                :value="value"
                                :error-message="
                                    errorMessage?.replaceAll('_', ' ')
                                "
                                :on-change="date => formField.onChange(date)"
                            />
                        </div>

                        <div v-else-if="field?.type === 'server-select'">
                            <new-select-component
                                :find-from-id="field?.find_from_id ?? true"
                                :url="resolveUrl(field, values)"
                                :from-resource="field?.from_resource ?? true"
                                :option-label="field?.option_label ?? 'name'"
                                :option-value="field?.option_value ?? 'id'"
                                :default-value="value"
                                :error-message="errorMessage"
                                :id="field.name"
                                :on-change="
                                    data => {
                                        handleSelectChange(
                                            field,
                                            data,
                                            formField,
                                        )
                                    }
                                "
                                :label="$translate(field.label)"
                            />
                        </div>
                        <div v-else-if="field.type === 'select'">
                            <q-select
                                :model-value="value"
                                :options="field.options"
                                :label="field.label"
                                dense
                                :error-message="errorMessage"
                                :error="!!errorMessage"
                                outlined
                                @update:model-value="
                                    value => formField.onChange(value)
                                "
                            />
                        </div>
                        <div v-else-if="field.type === 'radio'">
                            <p>{{ $translate(field.label) }}</p>
                            <q-radio
                                v-for="(option, index) in field.options"
                                :key="index"
                                :model-value="value"
                                :val="option"
                                :label="option"
                                @update:model-value="
                                    value => formField.onChange(value)
                                "
                            />
                            <p
                                class="text-xs text-red-500"
                                v-if="!!errorMessage"
                            >
                                {{ errorMessage }}
                            </p>
                        </div>
                    </div>
                </field>
            </template>

            <div :class="submitAreaClassName">
                <q-btn
                    :label="submitLabel ?? 'Save'"
                    :icon-right="submitIcon ?? 'save'"
                    color="primary"
                    type="submit"
                    size="small"
                    :loading="loading"
                    :disable="loading"
                />
                <slot name="other_actions" />
            </div>
            <slot :formValues="values" />
        </validation-form>
    </div>
</template>

<script>
import { Form as ValidationForm, Field } from 'vee-validate'
import * as yup from 'yup'
import DatepickerComponent from 'components/DatepickerComponent.vue'
import { resolve } from 'src/lib/helpers'
import { ref, computed, watch } from 'vue'
import { errorHandler } from 'src/lib/errorHandler'
import NewSelectComponent from 'components/NewSelectComponent.vue'

export default {
    components: {
        DatepickerComponent,
        ValidationForm,
        Field,
        NewSelectComponent,
    },
    props: [
        'fields',
        'className',
        'submitLabel',
        'submitIcon',
        'submitAreaClassName',
        'action',
        'onSubmitCompleted',
        'method',
    ],
    setup(props, { emit }) {
        const formValues = ref({})
        const previousProvince = ref(null)

        const validationSchema = computed(() =>
            yup.object(
                props.fields.reduce((acc, field) => {
                    acc[field.name] = field.validation
                    return acc
                }, {}),
            ),
        )

        const visibleFields = values => {
            return props.fields.filter(field =>
                typeof field.show === 'function' ? field.show(values) : true,
            )
        }

        const resolveUrl = (field, values) => {
            return typeof field.url === 'function'
                ? field.url(values)
                : field.url
        }

        const handleSelectChange = (field, data, formField) => {
            const value = resolve(field?.change_value ?? 'id', data)
            formField.onChange(value)
            if (typeof field?.on_select === 'function') {
                field.on_select(data)
            }
        }

        watch(
            () => formValues.value.province_id,
            newVal => {
                if (newVal && newVal !== previousProvince.value) {
                    console.log(newVal)
                    // Revalidate dependent field
                    $generalStore.revalidate('branch_id')
                    // Reset dependent field value
                    formValues.value.branch_id = null
                    previousProvince.value = newVal
                }
            },
        )

        return {
            validationSchema,
            formValues,
            visibleFields,
            resolveUrl,
            handleSelectChange,
            resolve,
        }
    },
    methods: {
        async onSubmit(values, actions) {
            this.loading = true
            try {
                const result = await this.$api({
                    url: this.action,
                    method: this.method ?? 'POST',
                    data: values,
                })
                if (typeof this.onSubmitCompleted === 'function') {
                    this.onSubmitCompleted(result)
                }
            } catch (err) {
                errorHandler(err, actions.setErrors, this.$router)
            } finally {
                this.loading = false
            }
        },
    },
    data() {
        return {
            loading: false,
        }
    },
}
</script>
