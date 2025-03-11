<template>
    <protected-component permission-key="murabeha-access" is-page>
        <q-intersection transition="jump-right">
            <div class="q-pa-md">
                <p class="text-lg">{{ $translate('Murabeha Request Form') }}</p>
                <server-data
                    :fetch-data="$route.params.id !== ''"
                    :url="`financing-mode/murabeha/steps-request/${$route.params.id}`"
                    v-slot="{ data: serverRequest }"
                    :on-data-received="onDataReceived"
                    id="murabeha-form"
                >
                    <q-stepper
                        v-model="step"
                        vertical
                        color="primary"
                        animated
                        class="mt-2"
                        header-nav
                        bordered
                        flat
                    >
                        <murabeha-select-user-step
                            :server-request="serverRequest"
                            :change-step="changeStep"
                            :completed-steps="completed_steps"
                        />

                        <murabeha-customer-other-personal-information-step
                            :server-request="serverRequest"
                            :change-step="changeStep"
                            :completed-steps="completed_steps"
                        />

                        <murabeha-customer-asset-details-form-step
                            :server-request="serverRequest"
                            :change-step="changeStep"
                            :completed-steps="completed_steps"
                        />

                        <murabeha-customer-borrowing-information
                            :server-request="serverRequest"
                            :change-step="changeStep"
                            :completed-steps="completed_steps"
                        />
                        <murabeha-customer-needed-items
                            :server-request="serverRequest"
                            :change-step="changeStep"
                            :completed-steps="completed_steps"
                        />
                    </q-stepper>
                </server-data>
            </div>
        </q-intersection>
    </protected-component>
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'
import MurabehaSelectUserStep from 'pages/FinancingMode/Murabeha/FormSteps/MurabehaSelectCustomerStep.vue'
import ServerData from 'components/ServerData.vue'
import MurabehaCustomerOtherPersonalInformationStep from 'pages/FinancingMode/Murabeha/FormSteps/MurabehaCustomerOtherPersonalInformationStep.vue'
import MurabehaCustomerAssetDetailsFormStep from 'pages/FinancingMode/Murabeha/FormSteps/MurabehaCustomerAssetDetailsFormStep.vue'
import MurabehaCustomerBorrowingInformation from 'pages/FinancingMode/Murabeha/FormSteps/MurabehaCustomerBorrowingInformation.vue'
import MurabehaCustomerNeededItems from 'pages/FinancingMode/Murabeha/FormSteps/MurabehaCustomerNeededItems.vue'
export default {
    components: {
        MurabehaCustomerNeededItems,
        MurabehaCustomerBorrowingInformation,
        MurabehaCustomerAssetDetailsFormStep,
        MurabehaCustomerOtherPersonalInformationStep,
        ServerData,
        MurabehaSelectUserStep,
        ProtectedComponent,
    },
    data() {
        return {
            step: 1,
            completed_steps: [],
        }
    },
    methods: {
        changeStep(stepNumber) {
            this.step = stepNumber
        },
        onDataReceived(requestData) {
            if (requestData.step_1?.customer !== null) {
                this.completed_steps.push(1)
                this.changeStep(2)
            }
            if (requestData.step_2?.is_completed) {
                this.completed_steps.push(2)
                this.changeStep(3)
            }
            if (requestData.step_3?.is_completed) {
                this.completed_steps.push(3)
                this.changeStep(4)
            }
            if (requestData.step_4?.is_completed) {
                this.completed_steps.push(4)
                this.changeStep(5)
            }
        },
    },
    mounted() {
        const step = this.$router.currentRoute.value.query?.step
        if (step) {
            this.step = parseInt(step)
        }
    },
}
</script>
