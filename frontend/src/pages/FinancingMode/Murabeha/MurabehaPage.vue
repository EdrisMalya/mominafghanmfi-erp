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
                            :label="$translate('Add new request for Murabeha')"
                        />
                    </protected-component>
                </div>
            </div>
            <div class="py-4">
                <datatable-component
                    url="financing-mode/murabeha/requests"
                    edit-permission-key="murabeha-access"
                    :on-edit="
                        data =>
                            $router.push({
                                path: `/financing-mode/murabeha/form/${data?.id}`,
                            })
                    "
                    :columns="[
                        {
                            label: 'ID',
                            name: 'id',
                            sortable: true,
                        },
                        {
                            label: 'Customer',
                            name: 'customer.full_name',
                        },
                        {
                            label: 'Status',
                            name: 'status',
                            sortable: true,
                        },
                        {
                            label: 'Created by',
                            name: 'created_by.full_name',
                            sortable: true,
                        },
                        {
                            label: 'Created date',
                            name: 'created_at',
                            sortable: true,
                        },
                        {
                            label: 'Last updated at',
                            name: 'updated_at',
                            sortable: true,
                        },
                    ]"
                />
            </div>
        </q-intersection>
    </protected-component>
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'
import DatatableComponent from 'components/DatatableComponent.vue'

export default {
    components: { DatatableComponent, ProtectedComponent },
}
</script>
