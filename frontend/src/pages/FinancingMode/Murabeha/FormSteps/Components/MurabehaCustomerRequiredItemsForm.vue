<template>
    <q-dialog :dir="$localization.direction" :model-value="true" persistent>
        <q-card class="min-w-[900px]">
            <q-card-section class="text-lg border-b">
                <p>{{ $translate('Customer required items form') }}</p>
            </q-card-section>
            <q-card-section>
                <server-data
                    :url="`/financing-mode/murabeha/steps-progress/5/${$route.params.id}?item_id=${itemId}`"
                    :fetch-data="itemId !== 0"
                    v-slot="{ data }"
                    :on-error="() => handleForm(false, 0)"
                >
                    <form-builder-component
                        class-name="grid grid-cols-3 gap-x-3"
                        submit-area-class-name="mt-5 col-span-3 border-t pt-4"
                        :action="`/financing-mode/murabeha/steps-progress/5/${
                            $route.params.id
                        }?_method=${
                            itemId !== 0 ? `PUT&item_id=${itemId}` : 'POST'
                        }`"
                        :on-submit-completed="onSuccess"
                        method="POST"
                        :fields="[
                            {
                                label: 'Item name',
                                name: 'item_name',
                                value: data?.item_name ?? null,
                                type: 'text',
                                validation: yup.string().required(),
                                className: 'col-span-3',
                            },
                            {
                                label: 'Quantity',
                                name: 'quantity',
                                value: data?.quantity ?? 1,
                                type: 'number',
                                validation: yup.number().required(),
                            },

                            {
                                label: 'Price per item',
                                name: 'price_per_item',
                                value: data?.price_per_item ?? 0,
                                type: 'money',
                                append_text: 'AFN',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Quality',
                                name: 'quality',
                                value: data?.quality ?? null,
                                type: 'select',
                                options: ['High', 'Medium', 'Low'],
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Does the customer have a specific supplier for the items mentioned?',
                                name: 'empty',
                                type: 'div',
                                className: 'col-span-3',
                                div_class: 'text-center text-xs py-5',
                            },
                            {
                                label: '',
                                name: 'has_supplier',
                                value: data?.has_supplier ?? 'No',
                                type: 'radio',
                                options: ['Yes', 'No'],
                                className: 'col-span-3',
                                validation: yup.string().required(),
                            },

                            {
                                label: 'Supplier Name',
                                name: 'supplier_name',
                                value: data?.supplier_name ?? null,
                                type: 'text',
                                validation: yup.string().nullable(),
                                show: values => values?.has_supplier === 'Yes',
                            },
                            {
                                label: 'Supplier address',
                                name: 'supplier_address',
                                value: data?.supplier_address ?? null,
                                type: 'text',
                                validation: yup.string().nullable(),
                                show: values => values?.has_supplier === 'Yes',
                                prepend_icon: 'location_on',
                                className: 'col-span-2',
                            },
                            {
                                label: 'Supplier contact number',
                                mask: '(###) ### - ####',
                                name: 'supplier_contact_number',
                                value: data?.supplier_contact_number ?? null,
                                type: 'text',
                                validation: yup.string().nullable(),
                                show: values => values?.has_supplier === 'Yes',
                                prepend_icon: 'phone',
                            },
                            {
                                label: 'Supplier email',
                                name: 'supplier_email',
                                value: data?.supplier_email ?? null,
                                type: 'text',
                                validation: yup.string().nullable(),
                                show: values => values?.has_supplier === 'Yes',
                                prepend_icon: 'email',
                                className: 'col-span-2',
                            },
                            {
                                label: 'Supporting document',
                                name: 'supplier_document',
                                value: null,
                                photo_url: data?.photo?.url ?? null,
                                type: 'file',
                                show: values => values?.has_supplier === 'Yes',
                                accept: 'image/*,application/pdf',
                                validation: yup.mixed().nullable(),
                                hint: 'Only PDF and images are allowed',
                            },
                        ]"
                    >
                        <template v-slot:other_actions>
                            <q-btn
                                :label="$translate('Close')"
                                icon-right="close"
                                color="red"
                                size="small"
                                class="ml-1 rtl:mr-1"
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
    props: ['itemId', 'handleForm'],
    setup() {
        return {
            yup,
        }
    },
    data() {
        return {
            borrowing_type_form: {
                model: false,
                created_id: 0,
            },
        }
    },
    methods: {
        onSuccess(result) {
            if (result.data.result) {
                this.$q.notify({
                    message: result.data.message,
                    color: 'green',
                })
                this.handleForm(false, 0, true)
            }
        },
        handleAssetTypeForm(model, created_id = 0) {
            this.borrowing_type_form = { model, created_id }
            if (created_id !== 0) {
                this.$generalStore.revalidate('borrowing_type_id')
            }
        },
    },
}
</script>
