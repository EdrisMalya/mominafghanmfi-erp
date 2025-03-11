<template>
    <q-step
        :name="3"
        :done="done || completedSteps.includes(3)"
        :title="$translate('Customer assets details')"
        icon="assignment"
        active-icon="person"
        done-color="green"
        :caption="$translate('This step is optional')"
    >
        <server-data
            :fetch-data="$route.params.id !== ''"
            :url="`financing-mode/murabeha/steps-request/${$route.params.id}`"
            v-slot="{ data }"
            :on-data-received="onDataReceived"
            id="murabeha-customer-asset-information"
        >
            <q-markup-table separator="cell" class="text-center my-3" dense>
                <thead class="bg-gray-200">
                    <tr>
                        <th>{{ $translate('No#') }}</th>
                        <th>{{ $translate('Asset') }}</th>
                        <th>{{ $translate('Asset type') }}</th>
                        <th>{{ $translate('Legal document') }}</th>
                        <th>{{ $translate('Value') }}</th>
                        <th>{{ $translate('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <template
                        v-if="data?.step_3?.customer_asset_info?.length > 0"
                    >
                        <tr
                            v-for="(asset, index) in data.step_3
                                .customer_asset_info"
                            :key="asset.id"
                        >
                            <td>{{ index + 1 }}</td>
                            <td>{{ asset.asset }}</td>
                            <td>{{ asset.asset_type?.name }}</td>
                            <td>
                                <a
                                    :href="asset.legal_document?.url"
                                    target="_blank"
                                    class="text-blue-500 border-b pb-1 border-blue-600"
                                >
                                    {{ asset.legal_document?.file_name }}
                                </a>
                            </td>
                            <td>{{ asset.formated_value }} - AFN</td>
                            <td>
                                <div class="flex items-center justify-center">
                                    <delete-provider v-slot="{ handleDelete }">
                                        <q-btn
                                            icon="delete"
                                            color="red"
                                            flat
                                            round
                                            size="sm"
                                            @click="
                                                handleDelete(
                                                    `/financing-mode/murabeha/steps-progress/3/${$route.params.id}?asset_id=${asset.id}`,
                                                    'murabeha-customer-asset-information',
                                                )
                                            "
                                        />
                                    </delete-provider>

                                    <q-btn
                                        icon="edit"
                                        color="orange"
                                        flat
                                        round
                                        size="sm"
                                        @click="
                                            handleModel(true, asset?.id, false)
                                        "
                                    />
                                </div>
                            </td>
                        </tr>
                    </template>
                    <tr v-else>
                        <td colspan="6" class="text-red-500 py-3">
                            {{ $translate('No asset found') }}
                        </td>
                    </tr>
                </tbody>
            </q-markup-table>
        </server-data>
        <div class="flex items-center gap-x-2 justify-between">
            <q-btn
                v-if="completedSteps.includes(2)"
                :label="$translate('Add new asset')"
                @click="handleModel(true, 0)"
                color="primary"
                icon-right="add"
            />
            <div class="flex items-center gap-x-2">
                <q-btn
                    :label="$translate('Back')"
                    size="small"
                    outline
                    icon="arrow_back"
                    color="primary"
                    @click="changeStep(3)"
                />
                <q-btn
                    icon-right="arrow_forward"
                    :label="$translate('Next')"
                    size="small"
                    outline
                    color="primary"
                    @click="changeStep(4)"
                />
            </div>
        </div>
    </q-step>
    <murabeha-customer-asset-form
        v-if="asset_form.model"
        :asset-id="asset_form.asset"
        :handle-form="handleModel"
    />
</template>
<script>
import ServerData from 'components/ServerData.vue'
import MurabehaCustomerAssetForm from 'pages/FinancingMode/Murabeha/FormSteps/Components/MurabehaCustomerAssetForm.vue'
import DeleteProvider from 'components/DeleteProvider.vue'

export default {
    components: { DeleteProvider, MurabehaCustomerAssetForm, ServerData },
    props: ['changeStep', 'serverRequest', 'completedSteps'],
    data() {
        return {
            asset_form: {
                model: false,
                asset: 0,
            },
            done: false,
        }
    },
    methods: {
        handleModel(model, asset = 0, revalidate) {
            this.asset_form = { model, asset }
            if (revalidate) {
                this.$generalStore.revalidate(
                    'murabeha-customer-asset-information',
                )
                this.done = true
            }
        },
    },
}
</script>
