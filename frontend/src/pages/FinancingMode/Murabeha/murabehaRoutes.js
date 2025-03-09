export const murabehaRoutes = {
    path: '/financing-mode/murabeha',
    children: [
        {
            path: '',
            component: () =>
                import('pages/FinancingMode/Murabeha/MurabehaPage.vue'),
            meta: {
                active: 'financing-mode',
                active_tab: 'murabeha',
                page_title: 'Murabeha section',
                breadcrumb: [
                    {
                        text: 'Dashboard',
                        link: '/',
                    },
                    {
                        text: 'Financing mode',
                        link: '/financing-mode',
                    },
                    {
                        text: 'Murabeha section',
                        link: '/',
                    },
                ],
            },
        },
        {
            path: 'form',
            children: [
                {
                    path: '',
                    component: () =>
                        import(
                            'pages/FinancingMode/Murabeha/MurabehaFormPage.vue'
                        ),
                    meta: {
                        active: 'financing-mode',
                        active_tab: 'murabeha',
                        page_title: 'Murabeha section',
                        breadcrumb: [
                            {
                                text: 'Dashboard',
                                link: '/',
                            },
                            {
                                text: 'Financing mode',
                                link: '/financing-mode',
                            },
                            {
                                text: 'Murabeha section',
                                link: '/financing-mode/murabeha',
                            },
                            {
                                text: 'Murabeha Form section',
                                link: '/',
                            },
                        ],
                    },
                },
                {
                    path: ':id?',
                    component: () =>
                        import(
                            'pages/FinancingMode/Murabeha/MurabehaFormPage.vue'
                        ),
                    meta: {
                        active: 'financing-mode',
                        active_tab: 'murabeha',
                        page_title: 'Murabeha section',
                        breadcrumb: [
                            {
                                text: 'Dashboard',
                                link: '/',
                            },
                            {
                                text: 'Financing mode',
                                link: '/financing-mode',
                            },
                            {
                                text: 'Murabeha section',
                                link: '/financing-mode/murabeha',
                            },
                            {
                                text: 'Murabeha Form section',
                                link: '/',
                            },
                        ],
                    },
                },
            ],
        },
    ],
}
