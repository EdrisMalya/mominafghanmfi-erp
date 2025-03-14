<template>
    <q-dialog :dir="$localization.direction" :model-value="true" persistent>
        <q-card class="min-w-[700px]">
            <q-card-section class="text-lg border-b">
                <p>{{ $translate('Customer borrowings form') }}</p>
            </q-card-section>
            <q-card-section>
                <server-data
                    :url="`/financing-mode/murabeha/steps-progress/4/${$route.params.id}?borrowing_id=${borrowingId}`"
                    :fetch-data="borrowingId !== 0"
                    v-slot="{ data }"
                    :on-error="() => handleForm(false, 0)"
                >
                    <form-builder-component
                        class-name="grid grid-cols-2 gap-x-3"
                        submit-area-class-name="mt-5 col-span-2 border-t pt-4"
                        :action="`/financing-mode/murabeha/steps-progress/4/${$route.params.id}?borrowing_id=${borrowingId}`"
                        :on-submit-completed="onSuccess"
                        :method="borrowingId !== 0 ? 'PUT' : 'POST'"
                        :fields="[
                            {
                                label: 'Loan Reference',
                                name: 'loan_reference',
                                value: data?.loan_reference ?? null,
                                type: 'text',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Name of the lender',
                                name: 'name_of_the_lender',
                                value: data?.name_of_the_lender ?? null,
                                type: 'text',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Address of the lender',
                                name: 'address_of_the_lender',
                                value: data?.address_of_the_lender ?? null,
                                type: 'text',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'For how long have you taken the loan?',
                                name: 'for_how_long',
                                value: data?.for_how_long ?? null,
                                type: 'text',
                                validation: yup.string().required(),
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
import AssetTypeForm from 'components/AssetTypeForm.vue'
export default {
    components: { FormBuilderComponent, ServerData },
    props: ['borrowingId', 'handleForm'],
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
