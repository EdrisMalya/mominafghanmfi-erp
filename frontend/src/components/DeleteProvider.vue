<template>
    <slot :handleDelete="handleDeleteRole" />
</template>
<script>
import { api } from 'boot/axios'
import { errorHandler } from 'src/lib/errorHandler'

export default {
    methods: {
        handleDeleteRole(
            url,
            revalidateKey,
            title = 'Confirm',
            message = 'Are you sure you want to delete',
        ) {
            this.$q
                .dialog({
                    title: this.$translate(title),
                    message: this.$translate(message),
                    cancel: true,
                })
                .onOk(async () => {
                    this.$q.loading.show()
                    try {
                        const result = await api.delete(url)
                        if (result.data.result) {
                            this.$q.notify({
                                message: this.$translate(result.data.message),
                                color: 'green',
                            })
                            this.$generalStore.revalidate(revalidateKey)
                        } else {
                            this.$q.loading.hide()
                            this.$q.notify({
                                message: this.$translate(result.data.message),
                                color: 'red',
                            })
                        }
                    } catch (error) {
                        errorHandler(error)
                        this.$q.notify({
                            message: this.$translate(
                                `Something went wrong - [error_message]`,
                                {
                                    error_message:
                                        error?.response?.data?.message,
                                },
                            ),
                            color: 'red',
                        })
                    } finally {
                        this.$q.loading.hide()
                    }
                })
        },
    },
}
</script>
