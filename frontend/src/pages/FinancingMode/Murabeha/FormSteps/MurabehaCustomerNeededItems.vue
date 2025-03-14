<template>
    <q-step
        :name="5"
        :title="$translate('Items needed to be financed')"
        icon="list"
        :caption="caption"
        :done="done || completedSteps.includes(5)"
        done-color="green"
        :error="!!caption"
        active-icon="playlist_add"
        error-icon="close"
    >
        <server-data
            :fetch-data="$route.params.id !== ''"
            :url="`financing-mode/murabeha/steps-request/${$route.params.id}`"
            v-slot="{ data: serverRequest }"
            id="murabeha-customer-required-items"
            :on-data-received="onDataReceived"
        >
            <p class="font-bold text-center my-8">
                {{ $translate('List of all customer items to be financed') }}
            </p>
            <q-markup-table dense separator="cell" class="text-center">
                <thead class="bg-gray-200">
                    <tr>
                        <th>
                            <q-checkbox
                                v-if="
                                    serverRequest.step_5
                                        .customer_requested_items.length > 0
                                "
                                dense
                                @click="
                                    selectAllItem(
                                        serverRequest.step_5
                                            .customer_requested_items,
                                    )
                                "
                                :model-value="
                                    selected_items.length ===
                                    serverRequest.step_5
                                        .customer_requested_items.length
                                "
                            />
                        </th>
                        <th>{{ $translate('NO#') }}</th>
                        <th>{{ $translate('Item Name') }}</th>
                        <th>{{ $translate('Quality') }}</th>
                        <th>{{ $translate('Quantity') }}</th>
                        <th>{{ $translate('Price Per Item') }}</th>
                        <th>{{ $translate('Total price') }}</th>
                        <th>{{ $translate('Has supplier?') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-if="
                            serverRequest.step_5.customer_requested_items
                                .length < 1
                        "
                    >
                        <td colspan="9" class="text-center text-red-500 !py-8">
                            {{ $translate('No record found') }}
                        </td>
                    </tr>
                    <template v-else>
                        <tr
                            v-for="(item, index) in serverRequest.step_5
                                .customer_requested_items"
                            :key="item.id"
                        >
                            <td>
                                <q-checkbox
                                    dense
                                    :model-value="
                                        selected_items.includes(item.id)
                                    "
                                    @click="selectItem(item)"
                                />
                            </td>
                            <td>
                                {{ index + 1 }}
                            </td>
                            <td>
                                {{ item.item_name }}
                            </td>
                            <td>
                                {{ item.quality }}
                            </td>
                            <td>
                                {{ item.quantity }}
                            </td>
                            <td>
                                {{ item.formatted_price_per_item }}
                                <span class="font-bold">
                                    {{ $translate('AFN') }}
                                </span>
                            </td>
                            <td>
                                {{ item.total_price }}
                                <span class="font-bold">
                                    {{ $translate('AFN') }}
                                </span>
                            </td>
                            <td>
                                {{ item.has_supplier }}
                            </td>
                        </tr>
                    </template>
                </tbody>
            </q-markup-table>
            <div class="my-3">
                <p class="text-xl">
                    <span> {{ $translate('Grand total') }}: </span>
                    <span>
                        {{ serverRequest.step_5?.formatted_grand_total }}
                    </span>
                    <span class="font-bold"> AFN </span>
                </p>
            </div>
            <div class="mt-3 flex items-center justify-between">
                <div class="flex items-center gap-x-2">
                    <q-btn
                        :label="$translate('Add new item')"
                        size="small"
                        color="primary"
                        icon-right="add"
                        @click="handleForm(true, 0)"
                    />
                    <q-btn
                        size="sm"
                        color="orange"
                        round
                        icon="edit"
                        @click="handleForm(true, selected_item?.id)"
                        v-if="selected_item"
                    >
                        <q-tooltip>
                            {{ $translate('Edit item') }}
                        </q-tooltip>
                    </q-btn>
                    <q-btn
                        size="sm"
                        color="blue"
                        round
                        icon="visibility"
                        v-if="
                            selected_item &&
                            selected_item.has_supplier === 'Yes'
                        "
                    >
                        <q-tooltip>
                            {{ $translate('View supplier details') }}
                        </q-tooltip>
                        <q-menu
                            transition-show="jump-up"
                            transition-hide="jump-down"
                        >
                            <q-card class="w-[600px]">
                                <q-card-section class="border-b">
                                    <p class="text-center font-bold text-lg">
                                        {{
                                            $translate('Item supplier details')
                                        }}
                                    </p>
                                </q-card-section>
                                <q-card-section class="grid grid-cols-2 gap-3">
                                    <q-input
                                        :model-value="
                                            selected_item.supplier_name
                                        "
                                        :label="$translate('Supplier name')"
                                        dense
                                    />

                                    <q-input
                                        :model-value="
                                            selected_item.supplier_contact_number
                                        "
                                        :label="
                                            $translate('Contact phone number')
                                        "
                                        dense
                                    >
                                        <template v-slot:prepend>
                                            <q-icon name="phone" />
                                        </template>
                                    </q-input>
                                    <q-input
                                        :model-value="
                                            selected_item.supplier_address
                                        "
                                        :label="$translate('Supplier address')"
                                        dense
                                        class="col-span-2"
                                    >
                                        <template v-slot:prepend>
                                            <q-icon name="location_on" />
                                        </template>
                                    </q-input>
                                    <div v-if="selected_item.supplier_document">
                                        <q-btn
                                            size="small"
                                            color="primary"
                                            icon-right="download"
                                            :href="
                                                selected_item.supplier_document
                                                    .url
                                            "
                                            target="_blank"
                                            :label="`${$translate(
                                                selected_item.supplier_document
                                                    .file_name,
                                            )} (${
                                                selected_item.supplier_document
                                                    .file_size
                                            })`"
                                        />
                                    </div>
                                </q-card-section>
                            </q-card>
                        </q-menu>
                    </q-btn>
                    <delete-provider v-slot="{ handleDelete }">
                        <q-btn
                            size="sm"
                            color="red"
                            round
                            icon="delete"
                            @click="
                                handleDelete(
                                    `/financing-mode/murabeha/steps-progress/5/${
                                        $route.params.id
                                    }?item_ids=${selected_items.join(',')}`,
                                    'murabeha-customer-required-items',
                                    'DELETE',
                                    () => {
                                        this.selected_item = null
                                        this.selected_items = []
                                    },
                                )
                            "
                            v-if="selected_items.length > 0"
                        >
                            <q-tooltip>
                                {{ $translate('Delete items') }}
                            </q-tooltip>
                        </q-btn>
                    </delete-provider>
                </div>
                <div class="flex items-center gap-x-2">
                    <q-btn
                        :label="$translate('Back')"
                        size="small"
                        outline
                        icon="arrow_back"
                        color="primary"
                        @click="changeStep(4)"
                    />
                    <q-btn
                        icon-right="arrow_forward"
                        :label="$translate('Next')"
                        size="small"
                        outline
                        color="primary"
                        @click="handleChangeStep(serverRequest)"
                    />
                </div>
            </div>
        </server-data>
    </q-step>
    <murabeha-customer-required-items-form
        :item-id="item_form.item_id"
        v-if="item_form.model"
        :handle-form="handleForm"
    />
</template>
<script>
import ServerData from 'components/ServerData.vue'
import MurabehaCustomerRequiredItemsForm from 'pages/FinancingMode/Murabeha/FormSteps/Components/MurabehaCustomerRequiredItemsForm.vue'
import DeleteProvider from 'components/DeleteProvider.vue'

export default {
    props: ['changeStep', 'serverRequest', 'completedSteps'],
    components: {
        DeleteProvider,
        MurabehaCustomerRequiredItemsForm,
        ServerData,
    },
    data() {
        return {
            item_form: {
                model: false,
                item_id: 0,
            },
            selected_items: [],
            selected_item: null,
            caption: null,
            done: false,
        }
    },
    methods: {
        handleForm(model, item_id, revalidate) {
            this.item_form = { model, item_id }
            if (revalidate) {
                this.$generalStore.revalidate(
                    'murabeha-customer-required-items',
                )
            }
        },
        selectItem(item) {
            const search = this.selected_items.findIndex(
                itemId => itemId === item?.id,
            )
            if (search !== -1) {
                this.selected_items = this.selected_items.filter(
                    itemId => itemId !== item?.id,
                )
                this.selected_item = null
            } else {
                this.selected_item = item
                this.selected_items.push(item.id)
            }
        },
        selectAllItem(data) {
            if (data.length === this.selected_items.length) {
                this.selected_items = []
                this.selected_item = null
            } else {
                this.selected_items = data?.map(item => item.id)
            }
        },
        handleChangeStep(serverData) {
            if (serverData.step_5.customer_requested_items.length > 0) {
                this.done = true
                this.changeStep(6)
            } else {
                this.caption = this.$translate('This field is required')
            }
        },
    },
}
</script>
