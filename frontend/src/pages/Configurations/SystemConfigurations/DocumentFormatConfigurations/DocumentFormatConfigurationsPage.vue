<template>
    <protected-component permission-key="document-formats-access" is-page>
        <div>
            <q-tabs v-model="tab" dense align="justify" class="bg-gray-100">
                <q-tab name="mails" label="Mails" />
                <q-tab name="alarms" label="Alarms" />
                <q-tab name="movies" label="Movies" />
            </q-tabs>
            <q-tab-panels v-model="tab" animated>
                <q-tab-panel name="mails">
                    <div class="text-h6">Mails</div>
                    <new-select-component
                        :url="url"
                        option-value="id"
                        option-label="name"
                        :from-resource="true"
                        :label="$translate('Testing')"
                        :on-change="data => console.log(data)"
                        :default-value="[6, 5]"
                        :multiple="true"
                        select-id="branch-province"
                    />
                    <q-btn label="Revalidate" @click="url = 'test'" />
                </q-tab-panel>

                <q-tab-panel name="alarms">
                    <div class="text-h6">Alarms</div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </q-tab-panel>

                <q-tab-panel name="movies">
                    <div class="text-h6">Movies</div>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </q-tab-panel>
            </q-tab-panels>
        </div>
    </protected-component>
</template>
<script>
import { defineComponent } from 'vue'
import ProtectedComponent from 'components/ProtectedComponent.vue'
import NewSelectComponent from 'components/NewSelectComponent.vue'

export default defineComponent({
    components: { NewSelectComponent, ProtectedComponent },
    data() {
        return {
            tab: 'mails',
            url: 'configurations/system-configurations/branch-province?for-api',
        }
    },
})
</script>
