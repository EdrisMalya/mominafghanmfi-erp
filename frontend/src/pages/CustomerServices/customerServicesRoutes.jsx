import { customersRoutes } from 'pages/CustomerServices/Customers/customersRoutes'

export const customerServicesRoutes = {
    path: 'customers-services',
    component: () =>
        import('pages/CustomerServices/CustomerServicesLayout.vue'),
    children: [
        {
            path: '',
            component: () =>
                import('pages/CustomerServices/CustomerServicesPage.vue'),
            meta: {
                active: 'customer-services',
                active_tab: 'default',
                breadcrumb: [
                    {
                        text: 'Customer services',
                        link: '',
                    },
                ],
            },
        },
        {
            ...customersRoutes,
        },
    ],
}
