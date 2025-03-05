<template>
    <protected-component permission-key="customers-access" is-page>
        <q-intersection transition="jump-right">
            <div class="flex items-center justify-between">
                <p class="font-bold text-lg">
                    {{ $translate('Our customers') }}
                </p>
                <div>
                    <protected-component permission-key="customers-create">
                        <q-btn
                            :label="$translate('Add new customer')"
                            icon-right="add"
                            outline
                            @click="handleForm(true, 0)"
                        />
                    </protected-component>
                </div>
            </div>
            <div class="mt-5">
                <datatable-component
                    url="customer-management/customers"
                    table-name="customers"
                    edit-permission-key="customers-update"
                    delete-permission-key="customers-delete"
                    :on-edit="customer => handleForm(true, customer?.id)"
                    :columns="[
                        {
                            name: 'id',
                            label: 'ID',
                            sortable: true,
                        },
                        {
                            name: 'first_name',
                            label: 'First name',
                            sortable: true,
                        },
                        {
                            name: 'last_name',
                            label: 'Last name',
                            sortable: true,
                        },
                        {
                            name: 'nic_number',
                            label: 'NIC number',
                            sortable: true,
                        },
                        {
                            name: 'status',
                            label: 'Status',
                            sortable: true,
                        },
                        {
                            name: 'created_by_user.full_name',
                            label: 'Created by',
                        },
                        {
                            name: 'created_at',
                            label: 'Created at',
                            sortable: true,
                        },
                        {
                            name: 'updated_at',
                            label: 'Last updated at',
                            sortable: true,
                        },
                    ]"
                />
            </div>
        </q-intersection>
    </protected-component>
    <customer-form-model
        v-if="customer_form.model"
        :customer-id="customer_form.customer_id"
        :handle-form="handleForm"
    />
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'
import DatatableComponent from 'components/DatatableComponent.vue'
import CustomerFormModel from 'pages/CustomerServices/Customers/CustomerFormModel.vue'

export default {
    components: { CustomerFormModel, DatatableComponent, ProtectedComponent },
    data() {
        return {
            customer_form: {
                model: false,
                customer_id: 0,
            },
        }
    },
    methods: {
        handleForm(model, customer_id, revalidate) {
            this.customer_form = { model, customer_id }
            if (revalidate) {
                this.$generalStore.revalidate('customers')
            }
        },
    },
}
</script>
