<template>
    <q-dialog :model-value="true" persistent>
        <q-card class="min-w-[700px]">
            <q-card-section class="text-lg border-b">
                <p>{{ $translate('Customer Form') }}</p>
            </q-card-section>
            <q-card-section>
                <server-data
                    :url="`customer-management/customers/${customerId}`"
                    :fetch-data="customerId !== 0"
                    v-slot="{ data }"
                >
                    <form-builder-component
                        class-name="grid grid-cols-3 gap-x-3"
                        submit-area-class-name="mt-5 col-span-3 border-t pt-4"
                        :action="`${
                            customerId === 0
                                ? 'customer-management/customers?_method=POST'
                                : `customer-management/customers/${customerId}?_method=PUT`
                        }`"
                        :on-submit-completed="onSuccess"
                        method="POST"
                        :fields="[
                            {
                                label: 'Customer photo',
                                name: 'photo',
                                value: null,
                                photo_url: data?.photo?.url ?? null,
                                type: 'file',
                                accept: 'image/*',
                                validation: yup
                                    .mixed()
                                    .when('test', (test, schema) => {
                                        if (!data) {
                                            return schema.required(
                                                'Photo is required',
                                            )
                                        }
                                        return schema.nullable()
                                    }),
                            },
                            {
                                label: 'NIC copy',
                                name: 'nic_copy',
                                value: null,
                                type: 'file',
                                photo_url: data?.nic_copy?.url,
                                accept: 'image/*',
                                validation: yup
                                    .mixed()
                                    .when('form', (form, schema) => {
                                        if (!data) {
                                            return schema.required(
                                                'NIC copy is required',
                                            )
                                        }
                                        return schema.nullable()
                                    }),
                            },
                            {
                                label: 'First name',
                                name: 'first_name',
                                value: data?.first_name,
                                type: 'text',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Last name',
                                name: 'last_name',
                                value: data?.last_name,
                                type: 'text',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Father name',
                                name: 'father_name',
                                value: data?.last_name,
                                type: 'text',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Date of birth',
                                name: 'dob',
                                value: data?.dob,
                                type: 'datepicker',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'NIC number',
                                name: 'nic_number',
                                value: data?.nic_number,
                                type: 'text',
                                validation: yup.string().required(),
                            },

                            {
                                label: 'Permanent address information ',
                                name: 'empty',
                                type: 'div',
                                className: 'col-span-3',
                                div_class: 'text-center py-5 font-bold',
                            },
                            {
                                label: 'Province',
                                name: 'province_id',
                                value: data?.province_id,
                                type: 'server-select',
                                url: 'general/country-provinces',
                                validation: yup.string().required(),
                                from_resource: false,
                            },
                            {
                                label: 'District',
                                name: 'district',
                                value: data?.district,
                                type: 'text',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Village',
                                name: 'village',
                                value: data?.village,
                                type: 'text',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Status',
                                name: 'status',
                                value: data?.status,
                                type: 'select',
                                validation: yup.string().nullable(),
                                options: ['active', 'inactive', 'block'],
                                show: values => customerId !== 0,
                            },
                        ]"
                    >
                        <template v-slot:other_actions>
                            <q-btn
                                :label="$translate('Close')"
                                icon-right="close"
                                color="red"
                                size="small"
                                class="ml-1"
                                @click="handleForm(false, 0)"
                            />
                        </template>
                    </form-builder-component>
                </server-data>
            </q-card-section>
        </q-card>
    </q-dialog>
</template>
<script>
import ServerData from 'components/ServerData.vue'
import FormBuilderComponent from 'components/FormBuilderComponent.vue'
import * as yup from 'yup'
export default {
    components: { FormBuilderComponent, ServerData },
    props: ['customerId', 'handleForm'],
    setup() {
        return {
            yup,
        }
    },
    methods: {
        onSuccess(result) {
            if (result.data.result) {
                this.$q.notify({
                    message: result.data.message,
                    color: 'green',
                })
                this.$router.push({
                    path: `/customers-services/customers/${result.data.customer_id}`,
                })
            }
        },
    },
}
</script>
