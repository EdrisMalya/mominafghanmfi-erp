<template>
    <div>
        <protected-component
            permission-key="system-configurations-access"
            is-page
        >
            <div>
                <q-splitter v-model="splitterModel">
                    <template v-slot:before>
                        <q-tabs
                            :model-value="$route.meta.active_tab"
                            vertical
                            @update:model-value="
                                value =>
                                    $router.push({
                                        path: `/configurations/system-configurations/${value}`,
                                    })
                            "
                        >
                            <protected-component
                                permission-key="branch-configurations-access"
                            >
                                <q-tab
                                    name="branch-configurations"
                                    icon="account_tree"
                                    :label="$translate('Branch configurations')"
                                />
                            </protected-component>
                            <protected-component
                                permission-key="document-formats-access"
                            >
                                <q-tab
                                    name="document-formats"
                                    icon="description"
                                    :label="$translate('Document formats')"
                                />
                            </protected-component>
                            <protected-component
                                permission-key="financing-modes-configurations-access"
                            >
                                <q-tab
                                    name="financing-modes-configurations"
                                    icon="payments"
                                    :label="$translate('Financing mode')"
                                />
                            </protected-component>
                            <protected-component
                                permission-key="asset-types-access"
                            >
                                <q-tab
                                    name="asset-types"
                                    :label="$translate('Asset types')"
                                />
                            </protected-component>
                        </q-tabs>
                    </template>

                    <template v-slot:after>
                        <q-tab-panels
                            :model-value="$route.meta.active_tab"
                            animated
                            swipeable
                            vertical
                            transition-prev="jump-up"
                            transition-next="jump-up"
                        >
                            <q-tab-panel :name="$route.meta.active_tab">
                                <router-view />
                            </q-tab-panel>
                        </q-tab-panels>
                    </template>
                </q-splitter>
            </div>
        </protected-component>
    </div>
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'

export default {
    components: { ProtectedComponent },
    data() {
        return {
            splitterModel: 20,
            tab: 'default',
        }
    },
}
</script>
