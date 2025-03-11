<template>
    <q-step
        :name="1"
        :title="
            completedSteps.includes(1)
                ? $translate('[customer_full_name] is selected', {
                      customer_full_name:
                          serverRequest?.step_1?.customer.full_name,
                  })
                : $translate('Customer select step')
        "
        icon="settings"
        :done="done || completedSteps.includes(1)"
        :error="!!errorMessage"
        :caption="$translate(errorMessage)"
        active-icon="person"
        done-color="green"
        :disable="false"
    >
        <form-builder-component
            v-if="$router.isReady() && mounted"
            action="financing-mode/murabeha/steps-progress/1"
            method="POST"
            :on-submit-completed="onSuccess"
            :hide-submit-button="completedSteps.includes(1)"
            :before-submit="
                () => {
                    this.errorMessage = null
                }
            "
            :fields="[
                {
                    label: 'Select customer',
                    name: 'customer_id',
                    value: customer_id ?? 0,
                    server_search_able: true,
                    type: 'server-select',
                    option_label: 'full_name',
                    option_value: 'id',
                    url: `customer-management/customers?for-api&customer_id=${
                        $router.currentRoute.value.query?.customer_id ?? 0
                    }`,
                    validation: yup
                        .number()
                        .required('Please select customer')
                        .typeError('Please select customer'),
                    on_select: customer => (customer_id = customer?.id ?? null),
                    show: () => !completedSteps.includes(1),
                },
            ]"
        >
            <template v-slot:other_actions v-if="completedSteps.includes(1)">
                <q-btn
                    :label="$translate('Next')"
                    color="primary"
                    size="small"
                    @click="changeStep(2)"
                />
            </template>
            <template v-slot:form_body>
                <div class="max-w-5xl mx-auto my-5">
                    <customer-details-component
                        v-if="
                            customer_id || serverRequest?.step_1?.customer?.id
                        "
                        :customer-id="
                            serverRequest?.step_1?.customer?.id ?? customer_id
                        "
                    />
                </div>
            </template>
        </form-builder-component>
    </q-step>
</template>
<script>
import FormBuilderComponent from 'components/FormBuilderComponent.vue'
import * as yup from 'yup'
import CustomerDetailsComponent from 'components/CustomerDetailsComponent.vue'
export default {
    components: { CustomerDetailsComponent, FormBuilderComponent },
    props: ['changeStep', 'serverRequest', 'completedSteps'],
    setup() {
        return {
            yup,
        }
    },
    data() {
        return {
            errorMessage: null,
            customer_id: null,
            done: false,
            mounted: false,
            disable: false,
        }
    },
    methods: {
        onSuccess(result) {
            if (result.data.result) {
                this.done = true
                this.changeStep(2)
                this.$q.notify({
                    message: result.data.message,
                    color: 'green',
                })
                this.$router.push({
                    path: `/financing-mode/murabeha/form/${result.data.request_id}`,
                })
            } else {
                this.errorMessage = result.data.message
                this.$q.notify({
                    message: $translate('Some validation not passed'),
                    color: 'red',
                })
            }
        },
    },
    mounted() {
        const paramsCustomerId =
            this.$router.currentRoute.value.query?.customer_id
        if (paramsCustomerId) {
            this.customer_id = parseInt(
                this.$router.currentRoute.value.query?.customer_id,
            )
        }
        this.mounted = true
    },
    watch: {
        serverRequest() {
            console.log('Test')
        },
    },
}
</script>
