<template>
    <div>
        <p
            class="text-center text-xs text-red-500 py-4"
            v-if="fields.length < 1"
        >
            {{ $translate('No field is selected') }}
        </p>
        <q-markup-table v-else separator="cell" dense class="text-center my-4">
            <thead class="bg-gray-100">
                <tr>
                    <th>{{ $translate('Order') }}</th>
                    <th>
                        {{ $translate('Field name') }}
                    </th>
                    <th>
                        {{ $translate('Field size') }}
                    </th>
                    <th>
                        {{ $translate('Field type') }}
                    </th>
                    <th>
                        {{ $translate('Field options') }}
                    </th>
                    <th>{{ $translate('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="field in fields" :key="field.id" class="border-b">
                    <td class="w-[100px]">
                        <q-input
                            type="number"
                            v-model="field.order"
                            outlined
                            dense
                            :label="$translate('Order')"
                        />
                    </td>
                    <td>{{ field.field_name }}</td>
                    <td>{{ field.width }}</td>
                    <td>{{ field.field.label }}</td>
                    <td class="py-2 text-left px-2 text-xs">
                        <p class="">
                            <span>{{ $translate('Is Required') }}:</span>
                            <span
                                class="font-bold ml-2"
                                v-if="field.field.options.required"
                                >Yes</span
                            >
                            <span class="font-bold ml-2" v-else>No</span>
                        </p>
                        <div v-if="field.field.value === 'number-field'">
                            <p class="">
                                <span>{{ $translate('Allow negative') }}:</span>
                                <span
                                    class="font-bold ml-2"
                                    v-if="field.field.options.allow_negative"
                                    >Yes</span
                                >
                                <span class="font-bold ml-2" v-else>No</span>
                            </p>
                            <p class="">
                                <span>{{ $translate('Min') }}:</span>
                                <span class="font-bold ml-2">
                                    {{ field.field.options.min }}
                                </span>
                            </p>
                            <p class="">
                                <span>{{ $translate('Max') }}:</span>
                                <span class="font-bold ml-2">
                                    {{ field.field.options.max }}
                                </span>
                            </p>
                        </div>
                        <div
                            v-if="
                                ['radio-button', 'select-box'].includes(
                                    field.field.value,
                                )
                            "
                        >
                            <div class="flex items-center gpa-x-2">
                                <p class="font-bold">
                                    {{ $translate('Options') }}:
                                </p>
                                <div>
                                    <q-chip
                                        v-for="option in field.field.options
                                            .options"
                                        :key="option"
                                        dense
                                        :label="$translate(option)"
                                    />
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <q-btn
                            size="sm"
                            icon="delete"
                            @click="handleDeleteField(field)"
                            round
                            flat
                            color="red"
                        />
                        <q-btn
                            size="sm"
                            icon="edit"
                            round
                            flat
                            color="orange"
                            @click="handleFieldForm(true, field, null)"
                        />
                    </td>
                </tr>
            </tbody>
        </q-markup-table>
        <q-btn
            icon="add"
            size="sm"
            round
            @click="handleFieldForm(true, null)"
        />
    </div>
    <dynamic-form-field-selector-component
        v-if="fieldForm.model"
        :data="fieldForm.field"
        :handle-form="handleFieldForm"
        :fields="fields"
    />
</template>
<script>
import { generateRandomId } from 'src/lib/helpers'
import { defineAsyncComponent } from 'vue'
export default {
    components: {
        DynamicFormFieldSelectorComponent: defineAsyncComponent(() =>
            import(
                'components/DynamicFormComponent/DynamicFormFieldSelectorComponent.vue'
            ),
        ),
    },
    props: ['defaultFields', 'onChange'],
    data() {
        return {
            fields: [],
            fieldForm: {
                model: false,
                field: null,
            },
        }
    },
    mounted() {
        this.fields = this.defaultFields
    },
    methods: {
        applyDrag(arr, dragResult) {
            const { removedIndex, addedIndex, payload } = dragResult
            if (removedIndex === null && addedIndex === null) return arr
            const result = [...arr]
            let itemToAdd = payload

            if (removedIndex !== null) {
                itemToAdd = result.splice(removedIndex, 1)[0]
            }
            if (addedIndex !== null) {
                result.splice(addedIndex, 0, itemToAdd)
            }
            return result
        },
        onDrop(dropResult) {
            this.fields = this.applyDrag(this.fields, dropResult)
        },
        handleDeleteField(field) {
            this.fields = this.fields.filter(
                fieldObj => fieldObj.id !== field.id,
            )
        },
        handleFieldForm(model, data, newField = null) {
            this.fieldForm = {
                model,
                field: data,
            }
            if (data) {
                const findIndex = this.fields.findIndex(
                    step => step.id === data.id,
                )
                if (findIndex !== -1) {
                    if (newField) {
                        console.log(newField)
                        this.fields[findIndex].field_name = newField.field_name
                        this.fields[findIndex].width = newField.width
                        this.fields[findIndex].field = newField.field
                    }
                }
            } else {
                if (newField !== null) {
                    let maxOrder = 1
                    if (this.fields.length > 0) {
                        maxOrder = this.fields[this.fields.length - 1].order + 1
                    }
                    this.fields = [
                        ...this.fields,
                        {
                            id: generateRandomId(),
                            order: maxOrder,
                            ...newField,
                        },
                    ]
                }
            }
            this.onChange(this.fields)
        },
    },
}
</script>
