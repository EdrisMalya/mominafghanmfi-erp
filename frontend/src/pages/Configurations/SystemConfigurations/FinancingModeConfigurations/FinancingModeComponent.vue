<template>
    <div class="flex items-center justify-between">
        <p class="font-bold text-weight-bold">
            {{
                $translate('[mode] finance mode configurations', {
                    mode: mode?.name,
                })
            }}
            -
            <span
                class="text-white px-2 rounded-full text-sm py-[1px] shadow"
                :class="`${mode.status ? 'bg-green-600' : 'bg-red-600'}`"
            >
                <span v-if="mode.status">
                    {{ $translate('Active') }}
                </span>
                <span v-else>
                    {{ $translate('Inactive') }}
                </span>
            </span>
            <span
                v-if="mode.system_default"
                class="text-white px-2 rounded-full text-sm py-[1px] shadow bg-green-600"
            >
                {{ $translate('Active') }}
            </span>
        </p>
        <div>
            <div class="flex items-center gap-x-1">
                <protected-component
                    permission-key="financing-modes-configurations-update"
                >
                    <q-btn
                        @click="handleModel(true, mode)"
                        icon="edit"
                        round
                        outline
                        color="orange"
                        size="sm"
                    />
                </protected-component>
                <protected-component
                    permission-key="financing-modes-configurations-delete"
                >
                    <delete-provider v-slot="{ handleDelete }">
                        <q-btn
                            @click="
                                handleDelete(
                                    `configurations/system-configurations/financing-mode/${mode?.id}`,
                                    'financing-modes',
                                )
                            "
                            icon="delete"
                            round
                            outline
                            color="red"
                            size="sm"
                        />
                    </delete-provider>
                </protected-component>
            </div>
        </div>
    </div>
    <div class="my-5">
        <financing-mode-configurations-component :financing-mode="mode" />
    </div>
    <financing-mode-configurations-config-model
        :handle-form="handelConfigModel"
        v-if="config_model"
        :steps="steps"
    />
</template>
<script>
import DeleteProvider from 'components/DeleteProvider.vue'
import ProtectedComponent from 'components/ProtectedComponent.vue'
import FinancingModeConfigurationsComponent from 'pages/Configurations/SystemConfigurations/FinancingModeConfigurations/Components/FinancingModeConfigurationsComponent.vue'
import FinancingModeConfigurationsConfigModel from 'pages/Configurations/SystemConfigurations/FinancingModeConfigurations/RequestStepFormModel.vue'
import { generateRandomId } from 'src/lib/helpers'

export default {
    components: {
        FinancingModeConfigurationsConfigModel,
        FinancingModeConfigurationsComponent,
        ProtectedComponent,
        DeleteProvider,
    },
    props: ['mode', 'handleModel'],
    data() {
        return {
            steps: [],
            config_model: false,
        }
    },
    methods: {
        applyDrag(arr, dragResult) {
            const { removedIndex, addedIndex, payload } = dragResult
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
        deleteConfig(id) {
            this.steps = this.steps.filter(item => item.id !== id)
        },
        handelConfigModel(model, step = null) {
            this.config_model = model
            if (step) {
                this.steps = [
                    ...this.steps,
                    {
                        id: generateRandomId(),
                        ...step,
                    },
                ]
            }
        },
    },
}
</script>
