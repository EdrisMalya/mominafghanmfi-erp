<template>
    <q-dialog :dir="$localization.direction" :model-value="true" persistent>
        <q-card class="min-w-[700px]">
            <q-card-section class="text-lg border-b">
                <p>{{ $translate('Asset form') }}</p>
            </q-card-section>
            <q-card-section>
                <server-data
                    :url="`/financing-mode/murabeha/steps-progress/3/${$route.params.id}?asset_id=${assetId}`"
                    :fetch-data="assetId !== 0"
                    v-slot="{ data }"
                    :on-error="() => handleForm(false, 0)"
                >
                    <form-builder-component
                        class-name="grid grid-cols-3 gap-x-3"
                        submit-area-class-name="mt-5 col-span-2 border-t pt-4"
                        :action="`/financing-mode/murabeha/steps-progress/3/${
                            $route.params.id
                        }?_method=${
                            assetId !== 0 ? `PUT&asset_id=${assetId}` : 'POST'
                        }`"
                        :on-submit-completed="onSuccess"
                        method="POST"
                        :fields="[
                            {
                                label: 'Asset',
                                name: 'asset',
                                value: data?.asset ?? null,
                                type: 'text',
                                validation: yup.string().required(),
                                className: 'col-span-3',
                            },
                            {
                                label: 'Asset type',
                                name: 'asset_type_id',
                                value:
                                    data?.asset_type?.id ??
                                    asset_type_form.created_id,
                                type: 'server-select',
                                url: 'general/asset-types',
                                validation: yup.string().required(),
                                from_resource: false,
                                create_able: true,
                                handle_form: handleForm,
                                handle_create: () => handleAssetTypeForm(true),
                            },
                            {
                                label: 'Legal document',
                                name: 'legal_document',
                                value: null,
                                photo_url: data?.legal_document?.url ?? null,
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
                                label: 'Value',
                                name: 'value',
                                value: data?.value,
                                type: 'money',
                                append_text: 'AFN',
                                validation: yup.number().required(),
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
        <asset-type-form
            v-model="asset_type_form.model"
            :handle-form="handleAssetTypeForm"
        />
    </q-dialog>
</template>
<script>
import ServerData from 'components/ServerData.vue'
import FormBuilderComponent from 'components/FormBuilderComponent.vue'
import * as yup from 'yup'
import AssetTypeForm from 'components/AssetTypeForm.vue'
export default {
    components: { AssetTypeForm, FormBuilderComponent, ServerData },
    props: ['assetId', 'handleForm'],
    setup() {
        return {
            yup,
        }
    },
    data() {
        return {
            asset_type_form: {
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
            this.asset_type_form = { model, created_id }
            if (created_id !== 0) {
                this.$generalStore.revalidate('asset_type_id')
            }
        },
    },
}
</script>
