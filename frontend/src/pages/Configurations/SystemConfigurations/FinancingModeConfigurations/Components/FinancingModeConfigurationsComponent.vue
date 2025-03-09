<template>
    <div>
        <q-tabs
            v-model="tab"
            dense
            active-color="primary"
            indicator-color="primary"
            align="left"
            narrow-indicator
        >
            <q-tab
                name="steps_for_request_completion"
                :label="$translate('Steps for request completion')"
            />
            <q-tab
                name="request_process_completion"
                :label="$translate('Request process completion configurations')"
            />
        </q-tabs>
        <q-separator />
        <q-tab-panels v-model="tab" animated>
            <q-tab-panel name="steps_for_request_completion">
                <steps-for-request-completion :financing-mode="financingMode" />
            </q-tab-panel>
            <q-tab-panel name="request_process_completion">
                <div>request_process_completion</div>
            </q-tab-panel>
        </q-tab-panels>
    </div>

    <dynamic-form-field-selector-component
        v-if="formFieldForm.model"
        :data="formFieldForm.model"
        :handle-form="handleForm"
    />
</template>
<script>
import DynamicFormFieldSelectorComponent from 'components/DynamicFormComponent/DynamicFormFieldSelectorComponent.vue'
import StepsForRequestCompletion from 'pages/Configurations/SystemConfigurations/FinancingModeConfigurations/Components/StepsForRequestCompletion.vue'

export default {
    props: ['financingMode'],
    components: {
        StepsForRequestCompletion,
        DynamicFormFieldSelectorComponent,
    },
    data() {
        return {
            formFieldForm: {
                model: false,
                data: null,
            },
            tab: 'steps_for_request_completion',
        }
    },
    methods: {
        handleForm(model, data, afterSave = null) {
            this.formFieldForm = { model, data }
            if (afterSave !== null) {
                console.log('test')
            }
        },
    },
}
</script>
