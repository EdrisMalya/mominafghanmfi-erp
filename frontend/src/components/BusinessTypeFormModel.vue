<template>
    <q-dialog :model-value="true" persistent>
        <q-card class="min-w-[500px]">
            <validation-form :validation-schema="schema" @submit="handleSubmit">
                <q-card-section class="text-lg border-b">
                    {{ $translate('Business type form') }}
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
                                :label="$translate('Business type')"
                                :error="!!errorMessage"
                                :error-message="errorMessage"
                                v-bind="field"
                            />
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
        })
        return { schema }
    },
    methods: {
        async handleSubmit(values, actions) {
            this.loading = true
            try {
                const method = this.data ? 'PUT' : 'POST'
                const url = this.data
                    ? `general/business-types/${this.data?.id}`
                    : 'general/business-types'
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
                    this.handleForm(false, result.data.created_id)
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
