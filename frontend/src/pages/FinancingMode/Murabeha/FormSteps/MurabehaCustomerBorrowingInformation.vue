<template>
    <q-step
        :name="4"
        :title="$translate('Customer borrowing information')"
        icon="cases"
        :caption="$translate('This section is optional')"
        :done="done || completedSteps.includes(4)"
        done-color="green"
    >
        <p class="text-center font-bold my-3">
            {{ $translate('All previous borrowings') }}
        </p>
        <server-data
            :fetch-data="$route.params.id !== ''"
            :url="`financing-mode/murabeha/steps-request/${$route.params.id}`"
            v-slot="{ data: serverRequest }"
            id="murabeha-customer-borrowing-information"
            :on-data-received="onDataReceived"
        >
            <q-markup-table dense separator="cell" class="text-center my-5">
                <thead class="bg-gray-200">
                    <tr>
                        <th>{{ $translate('NO#') }}</th>
                        <th>{{ $translate('Loan Reference') }}</th>
                        <th>{{ $translate('Name of the lender') }}</th>
                        <th>{{ $translate('Address of the lender') }}</th>
                        <th>{{ $translate('For how long?') }}</th>
                        <th>{{ $translate('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-if="
                            serverRequest?.step_4?.customer_borrowing_info
                                ?.length < 1
                        "
                    >
                        <td colspan="6" class="text-center text-red-500 py-3">
                            {{ $translate('No previous borrowings found') }}
                        </td>
                    </tr>
                    <template v-else>
                        <tr
                            v-for="(borrowing, index) in serverRequest?.step_4
                                ?.customer_borrowing_info"
                            :key="borrowing.id"
                        >
                            <td>{{ index + 1 }}</td>
                            <td>{{ borrowing?.loan_reference }}</td>
                            <td>{{ borrowing?.name_of_the_lender }}</td>
                            <td>{{ borrowing?.address_of_the_lender }}</td>
                            <td>{{ borrowing?.for_how_long }}</td>
                            <td>
                                <delete-provider v-slot="{ handleDelete }">
                                    <q-btn
                                        size="sm"
                                        icon="delete"
                                        round
                                        flat
                                        color="red"
                                        @click="
                                            handleDelete(
                                                `/financing-mode/murabeha/steps-progress/4/${$route.params.id}?borrowing_id=${borrowing?.id}`,
                                                'murabeha-customer-borrowing-information',
                                                'DELETE',
                                            )
                                        "
                                    />
                                </delete-provider>
                                <q-btn
                                    size="sm"
                                    icon="edit"
                                    round
                                    @click="
                                        handleBorrowingForm(true, borrowing?.id)
                                    "
                                    flat
                                    color="orange"
                                />
                            </td>
                        </tr>
                    </template>
                </tbody>
            </q-markup-table>
        </server-data>
        <div class="flex items-center gap-x-2 justify-between">
            <div class="flex items-center gap-x-2">
                <q-btn
                    v-if="completedSteps.includes(2)"
                    :label="$translate('Add borrowing information')"
                    @click="handleBorrowingForm(true, 0)"
                    color="primary"
                    icon-right="add"
                />
                <delete-provider v-slot="{ handleDelete }" v-if="!hide_skip">
                    <q-btn
                        v-if="completedSteps.includes(2)"
                        :label="$translate('No borrowings')"
                        @click="
                            handleDelete(
                                `/financing-mode/murabeha/steps-progress/4/${$route.params.id}?skip_customer_borrowing_information=true`,
                                '',
                                'PUT',
                                result => {
                                    if (result.result) {
                                        done = true
                                        changeStep(5)
                                    }
                                },
                            )
                        "
                        color="primary"
                        outline
                    />
                </delete-provider>
            </div>
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
                    @click="changeStep(5)"
                />
            </div>
        </div>
    </q-step>
    <murabeha-customer-borrowing-form-model
        v-if="borrowing_form.model"
        :borrowing-id="borrowing_form.borrowing_id"
        :handle-form="handleBorrowingForm"
    />
</template>
<script>
import DeleteProvider from 'components/DeleteProvider.vue'
import MurabehaCustomerBorrowingFormModel from 'pages/FinancingMode/Murabeha/FormSteps/Components/MurabehaCustomerBorrowingFormModel.vue'
import ServerData from 'components/ServerData.vue'

export default {
    components: {
        ServerData,
        MurabehaCustomerBorrowingFormModel,
        DeleteProvider,
    },
    props: ['changeStep', 'serverRequest', 'completedSteps'],
    data() {
        return {
            skip_loading: true,
            done: false,
            borrowing_form: {
                model: false,
                borrowing_id: 0,
            },
            hide_skip: false,
        }
    },
    methods: {
        handleBorrowingForm(model, borrowing_id, revalidation) {
            this.borrowing_form = { model, borrowing_id }
            console.log(borrowing_id)
            if (revalidation) {
                this.$generalStore.revalidate(
                    'murabeha-customer-borrowing-information',
                )
            }
        },
        onDataReceived(data) {
            if (data?.step_4?.customer_borrowing_info.length > 0) {
                this.hide_skip = true
            } else {
                this.hide_skip = false
            }
        },
    },
}
</script>
