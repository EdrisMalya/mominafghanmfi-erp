<template>
    <protected-component permission-key="customers-access" is-page>
        <q-intersection transition="jump-right">
            <server-data
                :url="`customer-management/customers/${$route.params.id}`"
                v-slot="{ data }"
            >
                <p>{{ data?.full_name }} customer details</p>
            </server-data>
        </q-intersection>
    </protected-component>
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'
import ServerData from 'components/ServerData.vue'

export default {
    components: { ServerData, ProtectedComponent },
}
</script>
