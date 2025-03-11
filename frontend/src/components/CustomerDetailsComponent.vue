<template>
    <server-data
        :url="`customer-management/customers/${customerId}?load_province=true`"
        v-slot="{ data }"
    >
        <q-card class="max-w-5xl mx-auto mt-5">
            <q-card-section>
                <profile-image-selector :default="data?.photo?.url" />
                <p class="text-lg text-center my-4">
                    {{
                        $translate('[full_name] Profile', {
                            full_name: data?.full_name,
                        })
                    }}
                </p>
            </q-card-section>
            <q-card-section>
                <div class="px-8 pb-8 grid grid-cols-3 gap-5">
                    <q-input
                        :model-value="data.first_name"
                        :label="$translate('First name')"
                        disable
                    />
                    <q-input
                        :model-value="data.last_name"
                        :label="$translate('Last name')"
                        disable
                    />
                    <q-input
                        :label="$translate('Father name')"
                        :model-value="data.father_name"
                        disable
                    />
                    <q-input
                        :label="$translate('Date of birth')"
                        :model-value="data.dob"
                        disable
                    >
                        <template v-slot:prepend>
                            <q-icon name="calendar_month" />
                        </template>
                    </q-input>
                    <q-input
                        :label="$translate('NIC number')"
                        :model-value="data.nic_number"
                        disable
                    />
                    <q-input
                        :label="$translate('Status')"
                        :model-value="data?.status"
                        disable
                    />
                    <div class="col-span-3">
                        <p class="font-bold text-center">
                            {{ $translate('Permanent address information') }}
                        </p>
                    </div>
                    <q-input
                        :label="$translate('Province')"
                        :model-value="$translate(data.province?.name)"
                        disable
                    />
                    <q-input
                        :label="$translate('District')"
                        :model-value="data?.district"
                        disable
                    />
                    <q-input
                        :label="$translate('Village')"
                        :model-value="data?.village"
                        disable
                    />
                    <div class="flex items-center col-span-3 gap-x-2">
                        <q-btn
                            v-if="showRequestBtn"
                            :label="$translate('Add a request')"
                            icon-right="add"
                        >
                            <q-menu
                                transition-show="flip-down"
                                transition-hide="flip-up"
                            >
                                <q-card class="w-[400px] !bg-gray-200">
                                    <q-card-section>
                                        <protected-component
                                            permission-key="murabeha-add-new-request"
                                        >
                                            <q-btn
                                                class="w-full"
                                                color="primary"
                                                :to="`/financing-mode/murabeha/form?customer_id=${data?.id}`"
                                                :label="
                                                    $translate('For Murabeha')
                                                "
                                            />
                                        </protected-component>
                                    </q-card-section>
                                </q-card>
                            </q-menu>
                        </q-btn>
                        <q-btn
                            icon-right="download"
                            :href="data?.nic_copy?.url"
                            target="_blank"
                            :label="$translate('Download NIC copy')"
                        />
                    </div>
                </div>
            </q-card-section>
        </q-card>
    </server-data>
</template>
<script>
import ServerData from 'components/ServerData.vue'
import ProtectedComponent from 'components/ProtectedComponent.vue'
import ProfileImageSelector from 'components/ProfileImageSelector.vue'

export default {
    components: { ProfileImageSelector, ProtectedComponent, ServerData },
    props: ['customerId', 'showRequestBtn'],
}
</script>
