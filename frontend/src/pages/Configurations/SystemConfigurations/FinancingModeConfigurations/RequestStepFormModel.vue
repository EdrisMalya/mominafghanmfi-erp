<template>
    <q-dialog :dir="$localization.direction" :model-value="true" persistent>
        <q-card class="min-w-[500px]">
            <validation-form :validation-schema="schema" @submit="handleSubmit">
                <q-card-section class="text-lg border-b">
                    {{ $translate('Financing mode step form') }}
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
                                :label="$translate('Step name')"
                                :error="!!errorMessage"
                                :error-message="errorMessage"
                                v-bind="field"
                            />
                        </field>
                        <field
                            name="required"
                            v-slot="{ errorMessage, value, field }"
                            :value="data?.required ?? true"
                        >
                            <q-toggle
                                :model-value="value"
                                :label="$translate('Required')"
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

export default {
    props: ['data', 'handleForm', 'steps'],
    components: { ValidationForm, Field },
    data() {
        return {
            loading: false,
        }
    },
    setup() {
        const schema = yup.object({
            name: yup.string().required(),
            required: yup.boolean().required(),
        })
        return { schema }
    },
    methods: {
        async handleSubmit(values, actions) {
            let checkName = null
            if (!this.data) {
                checkName = this.steps.findIndex(
                    step => step.name === values.name,
                )
            } else {
                checkName = this.steps.findIndex(
                    step =>
                        step.name === values.name && step.id !== this.data.id,
                )
            }
            if (checkName !== -1) {
                actions.setErrors({
                    name: 'this name is already taken',
                })
                return false
            }
            this.handleForm(false, this.data, values)
        },
    },
}
</script>
