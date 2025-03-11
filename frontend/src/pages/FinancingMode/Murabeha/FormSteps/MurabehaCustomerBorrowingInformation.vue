<template>
    <q-step
        :name="4"
        :title="$translate('Customer borrowing information')"
        icon="cases"
        :caption="$translate('This section is optional')"
        :done="done || completedSteps.includes(4)"
        done-color="green"
    >
        <div class="flex items-center gap-x-2 justify-between">
            <div class="flex items-center gap-x-2">
                <q-btn
                    v-if="completedSteps.includes(2)"
                    :label="$translate('Add borrowing information')"
                    @click="handleModel(true, 0)"
                    color="primary"
                    icon-right="add"
                />
                <delete-provider v-slot="{ handleDelete }">
                    <q-btn
                        v-if="completedSteps.includes(2)"
                        :label="$translate('Skip')"
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
</template>
<script>
import DeleteProvider from 'components/DeleteProvider.vue'

export default {
    components: { DeleteProvider },
    props: ['changeStep', 'serverRequest', 'completedSteps'],
    data() {
        return {
            skip_loading: true,
            done: false,
        }
    },
}
</script>
