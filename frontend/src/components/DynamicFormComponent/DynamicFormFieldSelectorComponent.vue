<template>
    <q-dialog persistent :model-value="true">
        <q-card class="min-w-[800px]">
            <validation-form :validation-schema="schema" @submit="handleSubmit">
                <q-card-section class="font-bold text-lg border-b">
                    {{ $translate('Form fields form') }}
                </q-card-section>
                <q-card-section class="border-t">
                    <div>
                        <field
                            :value="data?.field_name ?? ''"
                            name="field_name"
                            v-slot="{ errorMessage, value, field }"
                        >
                            <q-input
                                :model-value="value"
                                :error="!!errorMessage"
                                :error-message="errorMessage"
                                v-bind="field"
                                outlined
                                dense
                                :label="$translate('Field name')"
                            />
                        </field>
                        <field
                            :value="data?.width ?? '1x3'"
                            name="width"
                            v-slot="{ errorMessage, value, field }"
                        >
                            <q-select
                                class="w-[200px]"
                                :model-value="value"
                                :error="!!errorMessage"
                                :error-message="errorMessage"
                                v-bind="field"
                                outlined
                                :options="['1x3', '2x3', '3x3']"
                                dense
                                :label="$translate('Field size')"
                            />
                        </field>
                        <p class="font-bold">
                            {{ $translate('Select form field types') }}
                        </p>
                        <field
                            name="field"
                            v-slot="{ errorMessage, value, field: formField }"
                            :value="
                                data?.field ?? {
                                    value: 'text-field',
                                    label: 'Text field',
                                    options: {
                                        required: true,
                                    },
                                    width: 1,
                                }
                            "
                        >
                            <div class="flex items-center gap-x-2">
                                <div
                                    v-for="field in [
                                        {
                                            label: 'Text field',
                                            value: 'text-field',
                                            options: {
                                                required: true,
                                            },
                                        },
                                        {
                                            label: 'Number field',
                                            value: 'number-field',
                                            options: {
                                                allow_negative: true,
                                                required: true,
                                                min: 0,
                                                max: 0,
                                            },
                                        },
                                        {
                                            label: 'Radio button',
                                            value: 'radio-button',
                                            options: {
                                                required: true,
                                                options: [],
                                            },
                                        },
                                        {
                                            label: 'Select box',
                                            value: 'select-box',
                                            options: {
                                                required: true,
                                                options: [],
                                            },
                                        },
                                        {
                                            label: 'File selector',
                                            value: 'file-selector',
                                            options: {
                                                required: true,
                                                options: [],
                                            },
                                        },
                                        {
                                            label: 'Province selector',
                                            value: 'province-selector',
                                            options: {
                                                required: true,
                                                multiple: false,
                                            },
                                        },
                                        {
                                            label: 'Multiple fields',
                                            value: 'multiple-fields',
                                            options: {
                                                required: true,
                                                fields: [],
                                            },
                                        },
                                    ]"
                                    :key="field.key"
                                >
                                    <q-radio
                                        :model-value="value.value"
                                        :val="field.value"
                                        :label="$translate(field.label)"
                                        @update:model-value="
                                            value => {
                                                formField.onChange({
                                                    ...field,
                                                    value: value,
                                                })
                                            }
                                        "
                                    />
                                </div>
                            </div>
                            <div class="mt-2 border p-3 rounded">
                                <p class="text-center font-medium">
                                    {{ $translate('Field options') }}
                                </p>
                                <div class="flex flex-col mt-2">
                                    <div>
                                        <q-toggle
                                            dense
                                            :model-value="
                                                value.options.required
                                            "
                                            @update:model-value="
                                                toggleValue =>
                                                    formField.onChange({
                                                        ...value,
                                                        options: {
                                                            ...value.options,
                                                            required:
                                                                toggleValue,
                                                        },
                                                    })
                                            "
                                            :label="$translate('Is Required?')"
                                        />
                                    </div>
                                    <div
                                        v-if="value.value === 'number-field'"
                                        class="flex flex-col"
                                    >
                                        <div>
                                            <q-toggle
                                                dense
                                                :model-value="
                                                    value.options.allow_negative
                                                "
                                                @update:model-value="
                                                    toggleValue =>
                                                        formField.onChange({
                                                            ...value,
                                                            options: {
                                                                ...value.options,
                                                                allow_negative:
                                                                    toggleValue,
                                                            },
                                                        })
                                                "
                                                :label="
                                                    $translate('Allow negative')
                                                "
                                            />
                                        </div>
                                        <div
                                            class="mt-2 flex items-center gap-x-2"
                                        >
                                            <q-input
                                                :model-value="value.options.min"
                                                :label="$translate('Min')"
                                                dense
                                                type="number"
                                                outlined
                                                @update:model-value="
                                                    minValue =>
                                                        formField.onChange({
                                                            ...value,
                                                            options: {
                                                                ...value.options,
                                                                min: minValue,
                                                            },
                                                        })
                                                "
                                            />
                                            <q-input
                                                :model-value="value.options.max"
                                                :label="$translate('Max')"
                                                dense
                                                type="number"
                                                outlined
                                                @update:model-value="
                                                    minValue =>
                                                        formField.onChange({
                                                            ...value,
                                                            options: {
                                                                ...value.options,
                                                                max: minValue,
                                                            },
                                                        })
                                                "
                                            />
                                        </div>
                                    </div>
                                    <div
                                        class="mt-2"
                                        v-if="
                                            [
                                                'radio-button',
                                                'select-box',
                                            ].includes(value.value)
                                        "
                                    >
                                        <q-select
                                            :label="$translate('Add options')"
                                            hint="Press enter when you want to add the value"
                                            :model-value="value.options.options"
                                            use-input
                                            outlined
                                            dense
                                            use-chips
                                            multiple
                                            @new-value="createValue"
                                            hide-dropdown-icon
                                            input-debounce="0"
                                            new-value-mode="add"
                                            @update:model-value="
                                                optionsValue => {
                                                    formField.onChange({
                                                        ...value,
                                                        options: {
                                                            ...value.options,
                                                            options:
                                                                optionsValue,
                                                        },
                                                    })
                                                }
                                            "
                                        />
                                    </div>
                                    <div
                                        v-if="value.value === 'multiple-fields'"
                                    >
                                        <dynamic-form-fields-component
                                            :default-fields="
                                                value.options.fields
                                            "
                                            :on-change="
                                                fields =>
                                                    formField.onChange({
                                                        ...value,
                                                        options: {
                                                            ...value.options,
                                                            fields,
                                                        },
                                                    })
                                            "
                                        />
                                    </div>
                                </div>
                            </div>
                            <p
                                class="text-xs text-red-500"
                                v-if="!!errorMessage"
                            >
                                {{ errorMessage }}
                            </p>
                        </field>
                    </div>
                </q-card-section>
                <q-card-actions>
                    <q-btn
                        icon-right="close"
                        size="sm"
                        color="red"
                        :label="$translate('Close')"
                        @click="handleForm(false, null, null)"
                    />
                    <q-btn
                        color="green"
                        icon-right="save"
                        size="sm"
                        :label="$translate('Save')"
                        type="submit"
                    />
                </q-card-actions>
            </validation-form>
        </q-card>
    </q-dialog>
</template>
<script>
import { Form as ValidationForm, Field } from 'vee-validate'
import * as yup from 'yup'
import DynamicFormFieldsComponent from 'components/DynamicFormComponent/DynamicFormFieldsComponent.vue'
export default {
    props: ['model', 'data', 'handleForm', 'fields'],
    components: { DynamicFormFieldsComponent, ValidationForm, Field },
    setup() {
        const schema = yup.object({
            field_name: yup.string().required(),
            width: yup.string().required(),
            field: yup.object().required().typeError('Required field'),
        })
        return { schema }
    },
    methods: {
        createValue(val, done) {
            // specific logic to eventually call done(...) -- or not
            done(val, 'add-unique')

            // done callback has two optional parameters:
            //  - the value to be added
            //  - the behavior (same values of new-value-mode prop,
            //    and when it is specified it overrides that prop –
            //    if it is used); default behavior (if not using
            //    new-value-mode) is to add the value even if it would
            //    be a duplicate
        },
        handleSubmit(values, actions) {
            let checkName = null
            if (!this.data) {
                checkName = this.fields.findIndex(
                    field => field.field_name === values.field_name,
                )
            } else {
                checkName = this.fields.findIndex(
                    field =>
                        field.field_name === values.field_name &&
                        field.id !== this.data.id,
                )
            }
            if (checkName !== -1) {
                actions.setErrors({
                    field_name: 'this name is already taken',
                })
                return false
            }
            this.handleForm(false, this.data, values)
        },
    },
}
</script>
