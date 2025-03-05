<template>
    <protected-component permission-key="customers-services-access" is-page>
        <q-intersection transition="jump-right">
            <div class="p-3">
                <h2 class="text-xl font-bold">
                    {{ $translate('Customer services') }}
                </h2>

                <q-card class="mt-4">
                    <q-card-section>
                        <q-tabs
                            dense
                            align="left"
                            :model-value="$route.meta.active_tab"
                            @update:model-value="
                                value =>
                                    $router.push({
                                        path: `/customers-services/${value}`,
                                    })
                            "
                        >
                            <protected-component
                                permission-key="customers-access"
                            >
                                <q-tab
                                    name="customers"
                                    icon="groups"
                                    :label="$translate('Customers')"
                                />
                            </protected-component>
                        </q-tabs>
                        <q-separator />
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
                    </q-card-section>
                </q-card>
            </div>
        </q-intersection>
    </protected-component>
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'

export default {
    components: { ProtectedComponent },
    mounted() {
        this.$generalStore.setActivePage(null)
        this.$generalStore.setPageTitle('Customer services')
    },
}
</script>
