<template>
    <protected-component permission-key="branch-configurations-access" is-page>
        <div>
            <p class="text-lg font-bold">
                {{ $translate('List of our branches') }}
            </p>
            <div class="mt-5">
                <server-data
                    url="configurations/system-configurations/branch-province"
                    v-slot="{ data }"
                    id="branch-configurations"
                >
                    <q-expansion-item
                        v-for="province in data"
                        :key="province.id"
                        class="border"
                        expand-separator
                        :label="province.name"
                        :caption="
                            $translate(
                                'All branches under [province] province',
                                {
                                    province: $translate(province.name),
                                },
                            )
                        "
                    >
                        <q-card>
                            <q-card-section class="grid grid-cols-3 gap-3">
                                <q-card
                                    v-for="branch in province.branches"
                                    :key="branch.id"
                                >
                                    <q-card-section>
                                        <p class="text-center font-bold">
                                            {{ branch.name }}
                                        </p>
                                        <div class="flex flex-col mt-4">
                                            <div
                                                class="flex items-center gap-2"
                                            >
                                                <div>
                                                    <q-icon
                                                        name="location_on"
                                                        size="xs"
                                                    />
                                                </div>
                                                <p>{{ branch.location }}</p>
                                            </div>
                                            <div
                                                class="flex items-center gap-2 mt-1"
                                            >
                                                <div>
                                                    <q-icon
                                                        name="phone"
                                                        size="xs"
                                                    />
                                                </div>
                                                <p>{{ branch.phone_number }}</p>
                                            </div>
                                            <div
                                                class="flex items-center gap-2 mt-1"
                                            >
                                                <div>
                                                    <q-icon
                                                        name="email"
                                                        size="xs"
                                                    />
                                                </div>
                                                <p>{{ branch.email }}</p>
                                            </div>
                                            <div
                                                class="flex items-center gap-2 mt-1"
                                            >
                                                <div>
                                                    <q-icon
                                                        name="person"
                                                        size="xs"
                                                    />
                                                </div>
                                                <p>
                                                    <span class="!bold"
                                                        >{{
                                                            $translate(
                                                                'Branch manager',
                                                            )
                                                        }}
                                                        -
                                                    </span>
                                                    <span
                                                        class="px-2 bg-green-500 rounded-full shadow text-white"
                                                    >
                                                        {{
                                                            branch
                                                                .branch_manager
                                                                .full_name
                                                        }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <q-badge
                                                :color="
                                                    branch.status
                                                        ? 'green'
                                                        : 'red'
                                                "
                                            >
                                                {{ branch.status_text }}
                                            </q-badge>
                                            <q-badge
                                                v-if="branch.is_main"
                                                color="primary"
                                                class="ml-1"
                                            >
                                                Main branch
                                            </q-badge>
                                        </div>
                                        <div class="mt-2">
                                            <protected-component
                                                permission-key="branch-configurations-update"
                                            >
                                                <q-btn
                                                    round
                                                    size="sm"
                                                    icon="edit"
                                                    color="primary"
                                                    @click="
                                                        () => {
                                                            province_id =
                                                                province.id
                                                            handleForm(
                                                                true,
                                                                'branch',
                                                                branch,
                                                            )
                                                        }
                                                    "
                                                />
                                            </protected-component>
                                            <protected-component
                                                permission-key="branch-configurations-delete"
                                            >
                                                <delete-provider
                                                    v-slot="{ handleDelete }"
                                                >
                                                    <q-btn
                                                        class="ml-1"
                                                        round
                                                        size="sm"
                                                        icon="delete"
                                                        color="red"
                                                        @click="
                                                            handleDelete(
                                                                `configurations/system-configurations/branch/${branch?.id}`,
                                                                'branch-configurations',
                                                            )
                                                        "
                                                    />
                                                </delete-provider>
                                            </protected-component>
                                        </div>
                                    </q-card-section>
                                </q-card>
                                <q-card
                                    @click="
                                        () => {
                                            province_id = province.id
                                            handleForm(true, 'branch', null)
                                        }
                                    "
                                    class="bg-gray-100 flex items-center justify-center hover:bg-gray-200 cursor-pointer"
                                >
                                    <div class="text-center">
                                        <p class="font-bold">
                                            {{
                                                $translate(
                                                    'Add new branch for [province] province',
                                                    {
                                                        province: $translate(
                                                            province.name,
                                                        ),
                                                    },
                                                )
                                            }}
                                        </p>
                                        <div>
                                            <q-icon name="add" size="lg" />
                                        </div>
                                    </div>
                                </q-card>
                            </q-card-section>
                            <q-card-actions>
                                <q-btn
                                    size="sm"
                                    color="primary"
                                    outline
                                    icon-right="edit"
                                    :label="$translate('Update province')"
                                    @click="
                                        handleForm(true, 'province', province)
                                    "
                                />
                                <delete-provider v-slot="{ handleDelete }">
                                    <q-btn
                                        size="sm"
                                        color="red"
                                        outline
                                        icon-right="delete"
                                        @click="
                                            handleDelete(
                                                `configurations/system-configurations/branch-province/${province?.id}`,
                                                'branch-configurations',
                                            )
                                        "
                                        :label="$translate('Delete province')"
                                    />
                                </delete-provider>
                            </q-card-actions>
                        </q-card>
                    </q-expansion-item>
                </server-data>
                <protected-component
                    permission-key="branch-configurations-access"
                >
                    <q-btn
                        class="mt-2"
                        icon-right="add"
                        :label="$translate('Add new province')"
                        color="primary"
                        outline
                        @click="handleForm(true, 'province', null)"
                    />
                </protected-component>
            </div>
        </div>
    </protected-component>
    <branch-province-form-modal
        v-if="form.model && form.type === 'province'"
        :data="form.data"
        :handle-form="handleForm"
    />
    <branch-form-modal
        v-if="form.model && form.type === 'branch'"
        :data="form.data"
        :handle-form="handleForm"
        :province-id="province_id"
    />
</template>
<script>
import ProtectedComponent from 'components/ProtectedComponent.vue'
import BranchProvinceFormModal from 'pages/Configurations/SystemConfigurations/BranchConfigurations/BranchProvinceFormModal.vue'
import ServerData from 'components/ServerData.vue'
import DeleteProvider from 'components/DeleteProvider.vue'
import BranchFormModal from 'pages/Configurations/SystemConfigurations/BranchConfigurations/BranchFormModal.vue'

export default {
    components: {
        BranchFormModal,
        DeleteProvider,
        ServerData,
        BranchProvinceFormModal,
        ProtectedComponent,
    },
    data() {
        return {
            form: {
                model: false,
                type: null,
                data: null,
            },
            province_id: 0,
        }
    },
    methods: {
        handleForm(model, type, data, revalidate) {
            this.form = { model, type, data }
            if (revalidate) {
                this.$generalStore.revalidate('branch-configurations')
            }
        },
    },
}
</script>
