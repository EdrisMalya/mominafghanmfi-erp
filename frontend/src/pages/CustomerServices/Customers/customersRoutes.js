export const customersRoutes = {
    path: 'customers',
    children: [
        {
            path: '',
            component: () =>
                import('pages/CustomerServices/Customers/CustomersPage.vue'),
            meta: {
                active: 'customer-services',
                active_tab: 'customers',
                breadcrumb: [
                    {
                        text: 'Customer services',
                        link: '/customers-services',
                    },
                    {
                        text: 'Customers',
                        link: '',
                    },
                ],
            },
        },
        {
            path: ':id',
            component: () =>
                import(
                    'pages/CustomerServices/Customers/CustomerDetailsPage.vue'
                ),
            meta: {
                active: 'customer-services',
                active_tab: 'customers',
                breadcrumb: [
                    {
                        text: 'Customer services',
                        link: '/customers-services',
                    },
                    {
                        text: 'List of Customers',
                        link: '/customers-services/customers',
                    },
                    {
                        text: 'Customer details',
                        link: '',
                    },
                ],
            },
        },
    ],
}
