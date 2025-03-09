<template>
    <div>
        <h1 class="text-lg">
            {{ $translate('System default configurations') }}
        </h1>
        <protected-component
            permission-key="system-configurations-update-system-configurations"
        >
            <server-data
                url="configurations/system-configurations"
                v-slot="{ data }"
            >
                <form-builder-component
                    class-name="mt-5 grid grid-cols-5"
                    submit-area-class-name="col-span-5 mt-5"
                    action="configurations/system-configurations"
                    :on-submit-completed="onSuccess"
                    method="POST"
                    :fields="[
                        {
                            label: 'Minimum age for financing',
                            name: 'minimum_age_for_financing',
                            value: data?.minimum_age_for_financing,
                            type: 'number',
                            validation: yup.string().required(),
                        },
                        ,
                    ]"
                />
            </server-data>
            <template v-slot:else>
                <div class="flex items-center justify-center h-[40vh]">
                    <p class="font-bold">
                        {{ $translate('Welcome to system configurations') }}
                    </p>
                </div>
            </template>
        </protected-component>
    </div>
</template>
<script>
import { defineComponent } from 'vue'
import ProtectedComponent from 'components/ProtectedComponent.vue'
import FormBuilderComponent from 'components/FormBuilderComponent.vue'
import * as yup from 'yup'
import ServerData from 'components/ServerData.vue'

export default defineComponent({
    components: { ServerData, FormBuilderComponent, ProtectedComponent },
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
            }
        },
    },
})
</script>
