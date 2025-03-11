<template>
    <protected-component
        permission-key="financing-modes-configurations-access"
        is-page
    >
        <server-data
            :from-resource="false"
            url="general/asset-types"
            v-slot="{ data }"
            id="asset_types"
        >
            <p class="text-lg">{{ $translate('Asset types') }}</p>
            <div class="my-3">
                <delete-provider
                    v-for="asset_type in data"
                    :key="asset_type?.id"
                    v-slot="{ handleDelete }"
                >
                    <q-chip
                        :label="asset_type?.name"
                        :removable="true"
                        @remove="
                            handleDelete(
                                `general/asset-types?id=${asset_type?.id}`,
                                'asset_types',
                            )
                        "
                    />
                </delete-provider>
            </div>
        </server-data>
        <q-btn
            round
            color="primary"
            icon="add"
            size="sm"
            @click="handleAssetTypeForm(true, 0)"
        />
    </protected-component>
    <asset-type-form
        v-model="asset_type_form.model"
        :handle-form="handleAssetTypeForm"
    />
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'
import ServerData from 'components/ServerData.vue'
import DeleteProvider from 'components/DeleteProvider.vue'
import AssetTypeForm from 'components/AssetTypeForm.vue'

export default {
    components: {
        AssetTypeForm,
        DeleteProvider,
        ServerData,
        ProtectedComponent,
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
        handleAssetTypeForm(model, created_id = 0) {
            this.asset_type_form = { model, created_id }
            if (created_id !== 0) {
                this.$generalStore.revalidate('asset_types')
            }
        },
    },
}
</script>
