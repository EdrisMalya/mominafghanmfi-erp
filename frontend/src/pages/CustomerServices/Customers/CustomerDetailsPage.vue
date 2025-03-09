<template>
    <protected-component permission-key="customers-access" is-page>
        <q-intersection transition="jump-right">
            <customer-details-component
                :show-request-btn="true"
                :customer-id="$route.params.id"
            />
        </q-intersection>
    </protected-component>
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'
import CustomerDetailsComponent from 'components/CustomerDetailsComponent.vue'

export default {
    components: { CustomerDetailsComponent, ProtectedComponent },
}
</script>
