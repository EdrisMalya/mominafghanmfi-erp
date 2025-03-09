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

                        <q-step
                            :name="3"
                            title="Customer assets details"
                            icon="assignment"
                            disable
                        >
                            <q-btn label="back" @click="changeStep(2)" />
                        </q-step>

                        <q-step
                            :name="4"
                            title="Create an ad"
                            icon="add_comment"
                        >
                            Try out different ad text to see what brings in the
                            most customers, and learn how to enhance your ads
                            using features like ad extensions. If you run into
                            any problems with your ads, find out how to tell if
                            they're running and how to resolve approval issues.

                            <q-stepper-navigation>
                                <q-btn color="primary" label="Finish" />
                                <q-btn
                                    flat
                                    @click="step = 2"
                                    color="primary"
                                    label="Back"
                                    class="q-ml-sm"
                                />
                            </q-stepper-navigation>
                        </q-step>
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
export default {
    components: {
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
            if (requestData.step_2?.customer_other_info !== null) {
                this.completed_steps.push(2)
                this.changeStep(3)
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
