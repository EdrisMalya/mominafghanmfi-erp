<template>
    <protected-component permission-key="financing-mode-access" is-page>
        <q-intersection transition="jump-right">
            <div class="p-4">
                <p class="text-lg font-bold">
                    {{ $translate('Financing mode module') }}
                </p>
                <q-card class="mt-4">
                    <q-card-section>
                        <q-tabs
                            :model-value="$route.meta.active_tab"
                            align="left"
                            @update:model-value="
                                value =>
                                    $router.push({
                                        path: `/financing-mode/${value}`,
                                    })
                            "
                        >
                            <protected-component
                                permission-key="murabeha-access"
                            >
                                <q-tab
                                    name="murabeha"
                                    :label="$translate('Murabeha')"
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
import { defineComponent } from 'vue'
import ProtectedComponent from 'components/ProtectedComponent.vue'

export default defineComponent({
    components: { ProtectedComponent },
    mounted() {
        this.$generalStore.setActivePage('')
        this.$generalStore.setPageTitle(this.$route.meta.page_title)
    },
})
</script>
