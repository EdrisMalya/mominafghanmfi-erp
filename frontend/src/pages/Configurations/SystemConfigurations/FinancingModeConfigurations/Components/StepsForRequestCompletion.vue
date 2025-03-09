<template>
    <div v-if="steps?.length < 1">
        <p class="text-center text-red-500 py-9">
            {{ $translate('No form step found') }}
        </p>
    </div>
    <Container @drop="onDrop" v-else>
        <Draggable v-for="step in steps" :key="step.id">
            <q-expansion-item class="bg-white border" expand-icon-toggle>
                <template v-slot:header>
                    <div class="flex-1">
                        <div class="mt-[6px] flex items-center gap-x-1">
                            <div>
                                <q-icon name="drag_indicator" size="xs" />
                            </div>
                            <p class="ml-2 mt-[2px] flex-1">
                                {{ step.name }}
                                -
                                <span
                                    v-if="step.required"
                                    class="bg-green-500 px-2 text-x s text-white py-[2px] rounded-full"
                                >
                                    {{ $translate('Required') }}
                                </span>
                                <span
                                    v-else
                                    class="bg-blue-500 px-2 text-xs text-white py-[2px] rounded-full"
                                >
                                    {{ $translate('Optional step') }}
                                </span>
                            </p>
                            <div>
                                <q-btn
                                    size="xs"
                                    icon="delete"
                                    color="red"
                                    round
                                    flat
                                    @click="deleteConfig(step)"
                                />
                                <q-btn
                                    size="xs"
                                    icon="edit"
                                    color="orange"
                                    round
                                    flat
                                    @click="
                                        handleFormStepForm(true, step, null)
                                    "
                                />
                            </div>
                        </div>
                    </div>
                </template>
                <q-card>
                    <q-card-section>
                        <p class="font-bold">
                            {{ $translate('Step form fields') }}
                        </p>
                        <dynamic-form-fields-component
                            :default-fields="step.fields"
                            :on-change="
                                newFields => updateStepFields(step, newFields)
                            "
                        />
                    </q-card-section>
                </q-card>
            </q-expansion-item>
        </Draggable>
    </Container>
    <q-btn
        @click="handleFormStepForm(true, null, null)"
        :label="$translate('Add new step')"
        icon-right="add"
        size="sm"
        class="mt-3"
        color="primary"
        outline
    />

    <q-btn
        @click="saveSteps"
        :label="$translate('Save steps')"
        icon-right="save"
        size="sm"
        class="mt-3 ml-2"
        color="primary"
        :loading="save_loading"
        :disable="save_loading"
    />
    <request-step-form-model
        v-if="step_form.model"
        :data="step_form.data"
        :steps="steps"
        :handle-form="handleFormStepForm"
    />
</template>
<script>
import RequestStepFormModel from 'pages/Configurations/SystemConfigurations/FinancingModeConfigurations/RequestStepFormModel.vue'
import { generateRandomId } from 'src/lib/helpers'
import { Container, Draggable } from 'vue3-smooth-dnd'
import DynamicFormFieldsComponent from 'components/DynamicFormComponent/DynamicFormFieldsComponent.vue'
import { api } from 'boot/axios'
import { appRoutes } from 'src/appRouter/routes'
export default {
    props: ['financingMode'],
    components: {
        DynamicFormFieldsComponent,
        RequestStepFormModel,
        Container,
        Draggable,
    },
    data() {
        return {
            steps: [],
            step_form: {
                model: false,
                data: null,
            },
            save_loading: false,
            paste_steps: {
                model: false,
                json: null,
            },
        }
    },
    methods: {
        async saveSteps() {
            this.save_loading = true
            const formData = {
                financing_mode: this.financingMode,
                steps: this.steps,
            }
            try {
                const result = await this.$api.post(
                    'configurations/system-configurations/financing-mode-step-configurations',
                    formData,
                )
                this.$q.notify({
                    message: result.data.message,
                    color: result.data.result ? 'green' : 'red',
                })
            } catch (err) {
                this.$q.notify({
                    message: 'Something went wrong',
                    color: 'red',
                })
                console.log(err)
            } finally {
                this.save_loading = false
            }
        },
        handleFormStepForm(model, data, newStep = null) {
            this.step_form = {
                model,
                data,
            }
            if (data) {
                const findIndex = this.steps.findIndex(
                    step => step.id === data.id,
                )
                if (findIndex !== -1) {
                    if (newStep) {
                        this.steps[findIndex].name = newStep.name
                        this.steps[findIndex].required = newStep.required
                    }
                }
            } else {
                if (newStep !== null) {
                    this.steps = [
                        ...this.steps,
                        {
                            id: generateRandomId(),
                            fields: [],
                            ...newStep,
                        },
                    ]
                }
            }
        },
        deleteConfig(step) {
            this.steps = this.steps.filter(stepObj => stepObj.id !== step.id)
        },
        applyDrag(arr, dragResult) {
            const { removedIndex, addedIndex, payload } = dragResult
            api.post(
                appRoutes.user_management.permission.permission_group_api +
                    '/update-order',
                {
                    parent_id: this.id,
                    removedIndex,
                    addedIndex,
                },
            )
            if (removedIndex === null && addedIndex === null) return arr
            const result = [...arr]
            let itemToAdd = payload

            if (removedIndex !== null) {
                itemToAdd = result.splice(removedIndex, 1)[0]
            }
            if (addedIndex !== null) {
                result.splice(addedIndex, 0, itemToAdd)
            }
            return result
        },
        onDrop(dropResult) {
            this.steps = this.applyDrag(this.steps, dropResult)
        },
        updateStepFields(step, newFields) {
            const findIndex = this.steps.findIndex(
                stepObj => stepObj.id === step.id,
            )
            if (findIndex !== -1) {
                this.steps[findIndex].fields = newFields
            }
        },
    },
    mounted() {
        const steps = this.financingMode.steps
        if (steps.length > 0) {
            this.steps = steps
        }
    },
}
</script>
