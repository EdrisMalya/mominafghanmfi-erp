<template>
    <q-dialog :dir="$localization.direction" :model-value="true" persistent>
        <q-card class="min-w-[500px]">
            <validation-form :validation-schema="schema" @submit="handleSubmit">
                <q-card-section class="text-lg border-b">
                    {{ $translate('Financing mode form') }}
                </q-card-section>
                <q-card-section>
                    <div class="grid grid-cols-1">
                        <field
                            name="name"
                            :value="data?.name ?? ''"
                            v-slot="{ errorMessage, value, field }"
                        >
                            <q-input
                                :model-value="value"
                                dense
                                outlined
                                :label="$translate('Financing mode name')"
                                :error="!!errorMessage"
                                :error-message="errorMessage"
                                v-bind="field"
                            />
                        </field>
                        <field
                            name="default_mode"
                            v-slot="{ errorMessage, value, field }"
                            :value="data?.default_mode ?? false"
                        >
                            <q-toggle
                                :model-value="value"
                                :label="$translate('System default mode')"
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
                        @click="handleForm(false, null)"
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

export default {
    props: ['data', 'handleForm'],
    components: { ValidationForm, Field },
    data() {
        return {
            loading: false,
        }
    },
    setup() {
        const schema = yup.object({
            name: yup.string().required(),
            status: yup.boolean().required(),
            default_mode: yup.boolean().required(),
        })
        return { schema }
    },
    methods: {
        async handleSubmit(values, actions) {
            this.loading = true
            try {
                const method = this.data ? 'PUT' : 'POST'
                const url = this.data
                    ? `configurations/system-configurations/financing-mode/${this.data?.id}`
                    : 'configurations/system-configurations/financing-mode'
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
                    if (result.data.mode) {
                        this.handleForm(false, null, true, result.data)
                    } else {
                        this.handleForm(false, null, true)
                    }
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
