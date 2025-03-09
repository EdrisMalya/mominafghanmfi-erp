<template>
    <q-step
        :name="2"
        :title="
            completedSteps.includes(1)
                ? $translate(
                      '[customer_full_name] other personal information',
                      {
                          customer_full_name:
                              serverRequest?.step_1?.customer.full_name,
                      },
                  )
                : $translate('Customer other personal information')
        "
        icon="person"
        :done="done || completedSteps.includes(2)"
        :error="!!errorMessage"
        :caption="errorMessage"
        active-icon="person"
        done-color="green"
        :disable="false"
    >
        <form-builder-component
            class-name="grid grid-cols-6 gap-x-3"
            submit-area-class-name="col-span-6 gap-x-2 flex items-center"
            :on-values-changed="() => (unsaved = true)"
            :on-submit-completed="onRequestComplete"
            :action="`/financing-mode/murabeha/steps-progress/2/${$route.params.id}`"
            method="POST"
            :fields="[
                {
                    label: 'Personal information',
                    name: 'empty',
                    type: 'div',
                    className: 'col-span-6',
                    div_class: 'text-center py-5 font-bold',
                },
                {
                    name: 'age',
                    label: 'Age',
                    type: 'number',
                    value: serverRequest?.step_1?.customer?.age,
                    validation: yup.string().required(),
                    disabled: true,
                },
                {
                    name: 'phone_number',
                    label: 'Phone number',
                    type: 'text',
                    value:
                        serverRequest?.step_2?.customer_other_info
                            ?.phone_number ?? null,
                    disabled: true,
                    validation: yup.string().required(),
                    prepend_icon: 'phone',
                    mask: '(###) ### - ####',
                    className: 'col-span-1',
                },
                {
                    name: 'second_phone_number',
                    label: 'Second Phone number',
                    type: 'text',
                    value:
                        serverRequest?.step_2?.customer_other_info
                            ?.second_phone_number ?? null,
                    disabled: true,
                    validation: yup.string().nullable(),
                    prepend_icon: 'phone',
                    mask: '(###) ### - ####',
                    className: 'col-span-2',
                },
                {
                    name: 'current_job',
                    label: 'Current job',
                    type: 'text',
                    value:
                        serverRequest?.step_2?.customer_other_info
                            ?.current_job ?? null,
                    disabled: true,
                    validation: yup.string().required(),
                    className: 'col-span-2',
                },
                {
                    label: 'Customer income',
                    name: 'empty',
                    type: 'div',
                    className: 'col-span-6',
                    div_class: 'text-center py-5 font-bold',
                },
                {
                    name: 'personally_monthly_income',
                    label: 'Personally monthly income',
                    type: 'money',
                    value:
                        serverRequest?.step_2?.customer_other_info
                            ?.personally_monthly_income ?? 0,
                    validation: yup.number().required().min(1),
                    className: 'col-span-2',
                    append_text: 'AFN',
                },
                {
                    name: 'family_monthly_income',
                    label: 'Family monthly income',
                    type: 'money',
                    value:
                        serverRequest?.step_2?.customer_other_info
                            ?.family_monthly_income ?? 0,
                    validation: yup.number().required().min(1),
                    className: 'col-span-2',
                    append_text: 'AFN',
                },
                {
                    name: 'other_income',
                    label: 'Other income',
                    type: 'money',
                    value:
                        serverRequest?.step_2?.customer_other_info
                            ?.other_income ?? 0,
                    disabled: true,
                    validation: yup.number().required().min(0),
                    className: 'col-span-2',
                    append_text: 'AFN',
                },
                {
                    label: 'Current address information',
                    name: 'empty',
                    type: 'div',
                    className: 'col-span-6',
                    div_class: 'text-center py-5 font-bold',
                },
                {
                    label: 'Province',
                    name: 'province_id',
                    value: serverRequest?.step_2?.customer_other_info
                        ?.province_id,
                    type: 'server-select',
                    url: 'general/country-provinces',
                    validation: yup.string().required(),
                    className: 'col-span-2',
                    from_resource: false,
                },
                {
                    label: 'District',
                    name: 'district',
                    value: serverRequest?.step_2?.customer_other_info?.district,
                    type: 'text',
                    validation: yup.string().required(),
                    className: 'col-span-2',
                },
                {
                    label: 'Village',
                    name: 'village',
                    value: serverRequest?.step_2?.customer_other_info?.village,
                    type: 'text',
                    validation: yup.string().required(),
                    className: 'col-span-2',
                },
                {
                    label: 'Nature of residence',
                    name: 'nature_of_residence',
                    value: serverRequest?.step_2?.customer_other_info
                        ?.nature_of_residence,
                    type: 'radio_buttons',
                    options: ['Owner', 'Rental', 'Mortgaged'],
                    validation: yup.string().required(),
                    className: 'col-span-2',
                },
            ]"
        >
            <template v-slot:other_actions>
                <q-btn
                    v-if="!unsaved"
                    :label="$translate('Back')"
                    size="small"
                    icon="arrow_back"
                    color="primary"
                    @click="changeStep(1)"
                />
                <q-btn
                    v-if="!unsaved && completedSteps.includes(2)"
                    icon-right="arrow_forward"
                    :label="$translate('Next')"
                    size="small"
                    color="primary"
                    @click="changeStep(1)"
                />
            </template>
        </form-builder-component>
    </q-step>
</template>
<script>
import FormBuilderComponent from 'components/FormBuilderComponent.vue'
import * as yup from 'yup'

export default {
    components: { FormBuilderComponent },
    props: ['changeStep', 'serverRequest', 'completedSteps'],
    data() {
        return {
            errorMessage: null,
            customer_id: null,
            done: false,
            mounted: false,
            disable: false,
            unsaved: false,
        }
    },
    setup() {
        return {
            yup,
        }
    },
    methods: {
        onRequestComplete(result) {
            if (result.data.result) {
                this.$q.notify({
                    message: result.data.message,
                    color: 'green',
                })
                this.done = true
                this.changeStep(3)
                this.$generalStore.revalidate('murabeha-form')
            } else {
                this.errorMessage = result.data.message
            }
        },
    },
}
</script>
