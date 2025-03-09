<template>
    <protected-component
        permission-key="financing-modes-configurations-access"
        is-page
    >
        <q-intersection transition="jump-right">
            <p class="text-lg">
                {{ $translate('Financing mode configurations') }}
            </p>

            <server-data
                url="configurations/system-configurations/financing-mode"
                id="financing-modes"
                v-slot="{ data }"
                :on-data-received="data => (tab = `mode_${data[0]?.id}`)"
            >
                <div>
                    <q-card class="my-5">
                        <q-tabs
                            v-model="tab"
                            dense
                            active-color="primary"
                            indicator-color="primary"
                            align="left"
                            narrow-indicator
                        >
                            <q-tab
                                :name="`mode_${mode.id}`"
                                :label="mode.name"
                                v-for="mode in data"
                                :key="mode.id"
                            />
                        </q-tabs>

                        <q-separator />

                        <q-tab-panels v-model="tab" animated>
                            <q-tab-panel
                                :name="`mode_${mode.id}`"
                                v-for="mode in data"
                                :key="mode.id"
                            >
                                <financing-mode-component
                                    :handle-model="handleModel"
                                    :mode="mode"
                                />
                            </q-tab-panel>
                        </q-tab-panels>
                    </q-card>
                </div>
            </server-data>

            <protected-component
                permission-key="financing-modes-configurations-create"
            >
                <q-btn
                    :label="$translate('Add financing mode')"
                    icon-right="add"
                    size="small"
                    @click="handleModel(true, null)"
                />
            </protected-component>
        </q-intersection>
        <financing-mode-configurations-form-model
            v-if="form.model"
            :data="form.data"
            :handle-form="handleModel"
        />
    </protected-component>
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'
import FinancingModeConfigurationsFormModel from 'pages/Configurations/SystemConfigurations/FinancingModeConfigurations/FinancingModeConfigurationsFormModel.vue'
import ServerData from 'components/ServerData.vue'
import FinancingModeComponent from 'pages/Configurations/SystemConfigurations/FinancingModeConfigurations/FinancingModeComponent.vue'

export default {
    components: {
        FinancingModeComponent,
        ServerData,
        FinancingModeConfigurationsFormModel,
        ProtectedComponent,
    },
    data() {
        return {
            form: {
                model: false,
                data: null,
            },
            tab: null,
            config_model: false,
        }
    },
    methods: {
        handleModel(model, data, revalidate = false, updatedMode = null) {
            this.form = { model, data }
            if (revalidate) {
                this.$generalStore.revalidate('financing-modes')
                if (updatedMode !== null) {
                    this.tab = `mode_${updatedMode?.id}`
                }
            }
        },
    },
}
</script>
