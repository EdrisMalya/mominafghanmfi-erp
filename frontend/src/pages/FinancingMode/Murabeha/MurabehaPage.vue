<template>
    <protected-component permission-key="murabeha-add-new-request" is-page>
        <q-intersection transition="jump-right">
            <div class="flex items-center justify-between">
                <p class="text-lg">
                    {{ $translate('List of Murabeha requests') }}
                </p>
                <div>
                    <protected-component
                        permission-key="murabeha-add-new-request"
                    >
                        <q-btn
                            icon-right="add"
                            to="/financing-mode/murabeha/form"
                            :label="$translate('Add new request for Murbeha')"
                        />
                    </protected-component>
                </div>
            </div>
            <div class="py-4">
                <p class="text-center text-red-500">No request found</p>
            </div>
        </q-intersection>
    </protected-component>
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'

export default {
    components: { ProtectedComponent },
}
</script>
