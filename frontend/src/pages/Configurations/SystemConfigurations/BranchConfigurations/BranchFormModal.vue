<template>
    <q-dialog :dir="$localization.direction" :model-value="true" persistent>
        <q-card class="min-w-[600px]">
            <validation-form :validation-schema="schema" @submit="handleSubmit">
                <q-card-section class="text-lg border-b">
                    {{ $translate('Branch form') }}
                </q-card-section>
                <q-card-section>
                    <div class="grid grid-cols-2 gap-x-3">
                        <field
                            name="name"
                            :value="data?.name ?? ''"
                            v-slot="{ errorMessage, value, field }"
                        >
                            <q-input
                                class="col-span-2"
                                :model-value="value"
                                dense
                                outlined
                                :label="$translate('Branch name')"
                                :error="!!errorMessage"
                                :error-message="errorMessage"
                                v-bind="field"
                            />
                        </field>
                        <field
                            name="location"
                            :value="data?.location ?? ''"
                            v-slot="{ errorMessage, value, field }"
                        >
                            <q-input
                                :model-value="value"
                                dense
                                outlined
                                :label="$translate('Branch location')"
                                :error="!!errorMessage"
                                :error-message="errorMessage"
                                v-bind="field"
                            >
                                <template v-slot:prepend>
                                    <q-icon name="location_on" />
                                </template>
                            </q-input>
                        </field>
                        <field
                            name="phone_number"
                            :value="data?.phone_number ?? ''"
                            v-slot="{ errorMessage, value, field }"
                        >
                            <q-input
                                :model-value="value"
                                dense
                                outlined
                                :label="$translate('Branch phone number')"
                                :error="!!errorMessage"
                                :error-message="errorMessage"
                                v-bind="field"
                            >
                                <template v-slot:prepend>
                                    <q-icon name="phone" />
                                </template>
                            </q-input>
                        </field>
                        <field
                            name="email"
                            :value="data?.email ?? ''"
                            v-slot="{ errorMessage, value, field }"
                        >
                            <q-input
                                :model-value="value"
                                dense
                                outlined
                                :label="$translate('Branch email')"
                                :error="!!errorMessage"
                                :error-message="errorMessage"
                                v-bind="field"
                            >
                                <template v-slot:prepend>
                                    <q-icon name="email" />
                                </template>
                            </q-input>
                        </field>
                        <field
                            name="branch_manager_id"
                            :value="data?.branch_manager?.id ?? 0"
                            v-slot="{ errorMessage, value, field }"
                        >
                            <select-component
                                :find-from-id="true"
                                url="user-management/users?for_api"
                                option-label="full_name"
                                option-value="id"
                                :default-value="value"
                                :error-message="errorMessage"
                                :on-change="
                                    user => {
                                        field.onChange(user.id)
                                    }
                                "
                                :label="$translate('Branch manager')"
                            />
                        </field>
                        <div class="col-span-2">
                            <field
                                name="is_main"
                                v-slot="{ errorMessage, value, field }"
                                :value="data?.is_main ?? false"
                            >
                                <q-toggle
                                    v-if="!data"
                                    :model-value="value"
                                    :label="$translate('Is main branch?')"
                                    dense
                                    @update:model-value="
                                        value => field.onChange(value)
                                    "
                                />
                                <p class="text-red-500 text-sm">
                                    {{ errorMessage }}
                                </p>
                            </field>
                            <field
                                name="status"
                                v-slot="{ errorMessage, value, field }"
                                :value="data?.status ?? true"
                            >
                                <q-toggle
                                    :model-value="value"
                                    :label="$translate('Status')"
                                    dense
                                    @update:model-value="
                                        value => field.onChange(value)
                                    "
                                />
                                <p class="text-red-500 text-sm">
                                    {{ errorMessage }}
                                </p>
                            </field>
                        </div>
                    </div>
                </q-card-section>
                <q-card-actions align="right">
                    <q-btn
                        size="small"
                        label="Save"
                        icon-right="save"
                        color="green"
                        type="submit"
                        :loading="loading"
                        :disable="loading"
                    />
                    <q-btn
                        size="small"
                        label="Close"
                        icon-right="close"
                        color="red"
                        :disable="loading"
                        @click="handleForm(false, null, null)"
                    />
                </q-card-actions>
            </validation-form>
        </q-card>
    </q-dialog>
</template>
<script>
import { Form as ValidationForm, Field } from 'vee-validate'
import * as yup from 'yup'
import { errorHandler } from 'src/lib/errorHandler'
import SelectComponent from 'components/SelectComponent.vue'

export default {
    props: ['data', 'handleForm', 'provinceId'],
    components: { SelectComponent, ValidationForm, Field },
    data() {
        return {
            loading: false,
        }
    },
    setup() {
        const schema = yup.object({
            name: yup.string().required(),
            location: yup.string().required(),
            phone_number: yup.string().required(),
            email: yup.string().required(),
            branch_manager_id: yup
                .number()
                .required()
                .typeError('Required field'),
            is_main: yup.boolean().required(),
            status: yup.boolean().required(),
        })
        return { schema }
    },
    methods: {
        async handleSubmit(values, actions) {
            this.loading = true
            try {
                values['province_id'] = this.provinceId
                const method = this.data ? 'PUT' : 'POST'
                const url = this.data
                    ? `configurations/system-configurations/branch/${this.data?.id}`
                    : 'configurations/system-configurations/branch'
                const result = await this.$api({
                    url,
                    method,
                    data: values,
                })
                if (result.data.result) {
                    this.$q.notify({
                        message: result.data.message,
                        color: 'green',
                    })
                    this.handleForm(false, null, null, true)
                } else {
                    this.$q.notify({
                        message: result.data.message,
                        color: 'red',
                    })
                }
            } catch (err) {
                errorHandler(err, actions.setErrors)
            } finally {
                this.loading = false
            }
        },
    },
}
</script>
