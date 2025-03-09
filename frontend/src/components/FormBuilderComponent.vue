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
                            :disabled="field?.disabled ?? false"
                        >
                            <template v-slot:prepend>
                                <q-icon
                                    v-if="field?.prepend_icon"
                                    :name="field?.prepend_icon"
                                />
                            </template>
                            <template v-slot:append>
                                <span class="text-xs">{{
                                    field?.append_text
                                }}</span>
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
                                :server-search-able="
                                    field?.server_search_able ?? false
                                "
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
                                        if (
                                            typeof field?.on_select ===
                                            'function'
                                        ) {
                                            this.field?.on_select(data)
                                        }
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
                        <div v-else-if="field.type === 'file'">
                            <q-file
                                outlined
                                :model-value="value"
                                @update:model-value="
                                    file => formField.onChange(file)
                                "
                                dense
                                :label="field.label"
                                :accept="`${field.accept}`"
                                @rejected="onRejected"
                                :error="!!errorMessage"
                                :error-message="errorMessage"
                            >
                                <template v-slot:prepend>
                                    <q-icon name="attach_file" />
                                </template>
                                <template v-slot:append>
                                    <q-btn
                                        v-if="
                                            (field.accept?.includes('image') &&
                                                value) ||
                                            typeof field?.photo_url !==
                                                'undefined'
                                        "
                                        flat
                                        round
                                        icon="visibility"
                                        size="sm"
                                    >
                                        <q-menu>
                                            <q-card class="w-[400px]">
                                                <q-card-section>
                                                    <file-image-component
                                                        v-if="!field?.photo_url"
                                                        :file="value"
                                                    />
                                                    <q-img
                                                        :src="field?.photo_url"
                                                        class="w-full"
                                                    />
                                                </q-card-section>
                                            </q-card>
                                        </q-menu>
                                    </q-btn>
                                    <q-btn
                                        v-if="
                                            typeof field?.download_url !==
                                            'undefined'
                                        "
                                        icon="download"
                                        size="sm"
                                        round
                                        flat
                                        :href="field?.download_url"
                                        target="_blank"
                                    />
                                </template>
                            </q-file>
                        </div>
                        <div v-else-if="field.type === 'div'">
                            <p :class="field.div_class">{{ field.label }}</p>
                        </div>
                        <div v-else-if="field.type === 'money'">
                            <money-input
                                :error-message="errorMessage"
                                :model-value="value"
                                :label="field.label"
                                :append-text="field.append_text"
                                :on-change="
                                    moneyValue => formField.onChange(moneyValue)
                                "
                            />
                        </div>
                        <div
                            v-if="field.type === 'radio_buttons'"
                            :class="
                                !!errorMessage &&
                                'border border-red-500 p-3 text-red-500 my-2'
                            "
                        >
                            <p class="">{{ $translate(field.label) }}</p>
                            <q-radio
                                v-for="(option, index) in field.options"
                                :key="index"
                                :label="option"
                                :model-value="value"
                                :val="option"
                                @update:model-value="
                                    radioValue => formField.onChange(radioValue)
                                "
                            />
                            <p
                                class="text-xs text-red-500 mb-3"
                                v-if="!!errorMessage"
                            >
                                {{ errorMessage?.replaceAll('_', ' ') }}
                            </p>
                        </div>
                    </div>
                </field>
            </template>

            <slot name="form_body" />

            <div :class="submitAreaClassName">
                <q-btn
                    :label="submitLabel ?? 'Save'"
                    :icon-right="submitIcon ?? 'save'"
                    color="green"
                    type="submit"
                    size="small"
                    :loading="loading"
                    :disable="loading"
                    v-if="!hideSubmitButton ?? true"
                />
                <slot name="other_actions" />
            </div>
            <slot :formValues="values" />
            <form-values-listener
                :form-values="values"
                :on-values-changes="onValuesChanged"
            />
        </validation-form>
    </div>
</template>

<script>
import { Form as ValidationForm, Field, useForm } from 'vee-validate'
import * as yup from 'yup'
import DatepickerComponent from 'components/DatepickerComponent.vue'
import { resolve } from 'src/lib/helpers'
import { computed } from 'vue'
import { errorHandler } from 'src/lib/errorHandler'
import NewSelectComponent from 'components/NewSelectComponent.vue'
import FileImageComponent from 'components/FileImageComponent.vue'
import FormValuesListener from 'components/FormValuesListener.vue'
import MoneyInput from 'components/MonyField.vue'

export default {
    components: {
        MoneyInput,
        FormValuesListener,
        FileImageComponent,
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
        'beforeSubmit',
        'hideSubmitButton',
        'onValuesChanged',
    ],
    setup(props) {
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

        return {
            validationSchema,
            visibleFields,
            resolveUrl,
            handleSelectChange,
            resolve,
        }
    },
    methods: {
        async onSubmit(values, actions) {
            if (typeof this.beforeSubmit !== 'undefined') {
                this.beforeSubmit()
            }
            this.loading = true
            const checkFileExistence = this.fields.findIndex(
                field => field.type === 'file',
            )
            let formValues = null
            if (checkFileExistence !== -1) {
                const formData = new FormData()
                for (let key in values) {
                    formData.append(key, values[key] ?? '')
                }
                formValues = formData
            } else {
                formValues = values
            }
            try {
                const result = await this.$api({
                    url: this.action,
                    method: this.method ?? 'POST',
                    data: formValues,
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
        onRejected(rejectedEntries) {
            this.$q.notify({
                type: 'negative',
                message: `${rejectedEntries.length} file(s) did not pass validation constraints`,
            })
        },
        handleDonwloadLink(download_link, target = '_blank') {
            window.open(download_link, target)
        },
    },
    data() {
        return {
            loading: false,
        }
    },
}
</script>
