<template>
    <q-step
        :name="6"
        :done="done || completedSteps.includes(6)"
        :title="$translate('Request financial information')"
        icon="assignment"
        active-icon="payments"
        done-color="green"
        :error="!!error"
        :caption="error"
    >
        <validation-form
            :validation-schema="schema"
            @submit="onSubmit"
            v-slot="{ values }"
        >
            <q-timeline color="primary" class="max-w-2xl">
                <q-timeline-entry :title="$translate('Purpose of finance')">
                    <q-timeline color="teal">
                        <q-timeline-entry :title="$translate('Business type')">
                            <field
                                name="business_type_id"
                                v-slot="{ errorMessage, value, field }"
                            >
                                <new-select-component
                                    :from-resource="false"
                                    option-label="name"
                                    option-value="id"
                                    id="business_type_id"
                                    :error-message="errorMessage"
                                    url="general/business-types"
                                    :default-value="value"
                                    :created-able="true"
                                    :handle-creatable="
                                        () => (business_type_form = true)
                                    "
                                    :on-change="
                                        value => field.onChange(value?.id)
                                    "
                                />
                                <business-type-form-model
                                    v-if="business_type_form"
                                    :handle-form="
                                        (model, created_id) => {
                                            business_type_form = model
                                            field.onChange(created_id)
                                            $generalStore.revalidate(
                                                'business_type_id',
                                            )
                                        }
                                    "
                                />
                            </field>
                        </q-timeline-entry>
                        <q-timeline-entry :title="$translate('Business age')">
                            <field
                                name="business_age"
                                v-slot="{ errorMessage, value, field }"
                            >
                                <q-radio
                                    :model-value="value"
                                    val="new"
                                    @update:model-value="
                                        val => field.onChange(val)
                                    "
                                    :label="$translate('New')"
                                />
                                <q-radio
                                    :model-value="value"
                                    val="running"
                                    @update:model-value="
                                        val => field.onChange(val)
                                    "
                                    :label="$translate('Running')"
                                />
                                <p
                                    v-if="!!errorMessage"
                                    class="text-red-500 text-xs"
                                >
                                    {{ errorMessage }}
                                </p>
                            </field>
                        </q-timeline-entry>
                        <q-slide-transition>
                            <q-timeline-entry
                                :title="$translate('Number of employees')"
                                v-if="values?.business_age === 'running'"
                            >
                                <field
                                    name="number_of_employees"
                                    v-slot="{ errorMessage, value, field }"
                                >
                                    <q-input
                                        dense
                                        :model-value="value"
                                        v-bind="field"
                                        :error="!!errorMessage"
                                        :error-message="errorMessage"
                                        type="number"
                                        outlined
                                    />
                                </field>
                            </q-timeline-entry>
                        </q-slide-transition>
                    </q-timeline>
                </q-timeline-entry>
                <q-timeline-entry :title="$translate('Repayment')">
                    <div></div>
                </q-timeline-entry>
            </q-timeline>
            <q-btn
                :label="$translate('Save')"
                icon-right="save"
                type="submit"
                size="small"
                color="primary"
            />
        </validation-form>
    </q-step>
</template>
<script>
import { Form as ValidationForm, Field } from 'vee-validate'
import * as yup from 'yup'
import NewSelectComponent from 'components/NewSelectComponent.vue'
import BusinessTypeFormModel from 'components/BusinessTypeFormModel.vue'
export default {
    props: ['changeStep', 'serverRequest', 'completedSteps'],
    components: {
        BusinessTypeFormModel,
        NewSelectComponent,
        ValidationForm,
        Field,
    },
    data() {
        return {
            done: false,
            error: null,
            business_type_form: false,
        }
    },
    setup() {
        const schema = yup.object({
            business_type_id: yup.number().required('This field is required'),
            business_age: yup.string().required('This field is required'),
            number_of_employees: yup
                .number()
                .required('This field is required'),
        })
        return {
            schema,
        }
    },
    methods: {
        onSubmit(values) {
            console.log(values)
        },
    },
}
</script>
