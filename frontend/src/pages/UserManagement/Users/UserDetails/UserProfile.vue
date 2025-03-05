<template>
    <protected-component permission-key="users-profile-edit" is-page>
        <server-data
            :url="`user-management/user/profile/${$route.params.id}`"
            v-slot="{ data }"
        >
            <q-card class="max-w-4xl mx-auto">
                <q-card-section>
                    <ProfileImageSelector :default="data.image" />
                </q-card-section>
                <q-card-section>
                    <p class="text-lg font-bold text-center">
                        {{
                            $translate('[full_name] user profile', {
                                full_name: data.full_name,
                            })
                        }}
                    </p>
                </q-card-section>

                <q-card-section>
                    <form-builder-component
                        class-name="grid grid-cols-3 gap-x-3"
                        submit-area-class-name="mt-5 col-span-3"
                        :action="`user-management/user/profile/${$route.params.id}`"
                        :on-submit-completed="onSuccess"
                        method="POST"
                        :fields="[
                            {
                                label: 'Job title',
                                name: 'job_title',
                                value: data?.profile?.job_title ?? null,
                                type: 'text',
                                validation: yup.string().required(),
                                className: 'col-span-3',
                            },
                            {
                                label: 'Employee ID',
                                name: 'employee_id',
                                value: data?.profile?.employee_id ?? null,
                                type: 'number',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Phone number',
                                name: 'phone_number',
                                value: data?.profile?.phone_number ?? null,
                                type: 'text',
                                validation: yup.string().required(),
                                prepend_icon: 'phone',
                                mask: '(###) ### - ####',
                            },
                            {
                                label: 'Date of Birth',
                                name: 'dob',
                                value: data?.profile?.dob ?? null,
                                type: 'datepicker',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Current address',
                                name: 'current_address',
                                value: data?.profile?.current_address ?? null,
                                type: 'text',
                                prepend_icon: 'location_on',
                                validation: yup.string().required(),
                                className: 'col-span-2',
                            },
                            {
                                label: 'Permanent address',
                                name: 'permanent_address',
                                value: data?.profile?.permanent_address ?? null,
                                type: 'text',
                                prepend_icon: 'location_on',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'Joining date',
                                name: 'joining_date',
                                value: data?.profile?.joining_date ?? null,
                                type: 'datepicker',
                                validation: yup.string().required(),
                            },
                            {
                                label: 'NIC number',
                                name: 'nic_number',
                                value: data?.profile?.nic_number ?? null,
                                type: 'text',
                                validation: yup.string().required(),
                                className: 'col-span-2',
                            },
                            {
                                label: 'Alternative phone number',
                                name: 'alternative_phone_number',
                                value:
                                    data?.profile?.alternative_phone_number ??
                                    null,
                                type: 'text',
                                validation: yup.string().required(),
                                prepend_icon: 'phone',
                                mask: '(###) ### - ####',
                            },
                            {
                                label: 'Alternative phone number relationship',
                                name: 'a_p_n_relationship',
                                value:
                                    data?.profile?.a_p_n_relationship ?? null,
                                type: 'text',
                                validation: yup
                                    .string()
                                    .required(
                                        'Alternative phone number relationship is required',
                                    ),
                                className: 'col-span-2',
                            },
                            {
                                label: 'Province',
                                name: 'province_id',
                                value: data?.profile?.province_id,
                                type: 'server-select',
                                url: 'configurations/system-configurations/branch-province?for-api',
                                validation: yup.number().required(),
                            },
                            {
                                label: 'Branch',
                                name: 'branch_id',
                                type: 'server-select',
                                value: data?.profile?.branch_id,
                                url: values =>
                                    `configurations/system-configurations/branch?for-api=true&province_id=${
                                        values?.province_id || 0
                                    }`,
                                show: values => !!values.province_id,
                                validation: yup.number().required(),
                            },
                        ]"
                    />
                </q-card-section>
            </q-card>
        </server-data>
    </protected-component>
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'
import ServerData from 'components/ServerData.vue'
import FormBuilderComponent from 'components/FormBuilderComponent.vue'
import * as yup from 'yup'
import ProfileImageSelector from 'components/ProfileImageSelector.vue'

export default {
    components: {
        ProfileImageSelector,
        FormBuilderComponent,
        ServerData,
        ProtectedComponent,
    },
    setup() {
        return {
            yup,
        }
    },
    methods: {
        onSuccess(result) {
            this.$q.notify({
                message: result.data.message,
                color: 'green',
            })
        },
    },
}
</script>
