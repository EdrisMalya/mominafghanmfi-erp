<template>
    <q-dialog :dir="$localization.direction" :model-value="true" persistent>
        <q-card class="min-w-[400px]">
            <q-card-section class="text-lg border-b">
                <p>{{ $translate('Customer Form') }}</p>
            </q-card-section>
            <q-card-section>
                <form-builder-component
                    class-name="grid grid-cols-1 gap-x-3"
                    submit-area-class-name="mt-5 col-span-1 border-t pt-4 space-x-2"
                    action="general/asset-types"
                    :on-submit-completed="onSuccess"
                    method="POST"
                    :fields="[
                        {
                            label: 'Asset type',
                            name: 'name',
                            value: null,
                            type: 'text',
                            validation: yup.string().required(),
                        },
                    ]"
                >
                    <template v-slot:other_actions>
                        <q-btn
                            :label="$translate('Close')"
                            icon-right="close"
                            color="red"
                            size="small"
                            class="ml-1"
                            @click="handleForm(false, 0)"
                        />
                    </template>
                </form-builder-component>
            </q-card-section>
        </q-card>
    </q-dialog>
</template>
<script>
import FormBuilderComponent from 'components/FormBuilderComponent.vue'
import * as yup from 'yup'
export default {
    components: { FormBuilderComponent },
    props: ['assetId', 'handleForm'],
    setup() {
        return {
            yup,
        }
    },
    methods: {
        onSuccess(result) {
            if (result.data.result) {
                this.$q.notify({
                    message: result.data.message,
                    color: 'green',
                })
                this.handleForm(false, result.data.created_id)
            }
        },
    },
}
</script>
