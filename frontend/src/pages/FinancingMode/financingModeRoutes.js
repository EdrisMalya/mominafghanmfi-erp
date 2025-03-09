import { murabehaRoutes } from 'pages/FinancingMode/Murabeha/murabehaRoutes'

export const financingModeRoutes = {
    path: '/financing-mode',
    component: () => import('pages/FinancingMode/FinancingModeLayout.vue'),
    children: [
        {
            path: '',
            component: () =>
                import('pages/FinancingMode/FinancingModePage.vue'),
            meta: {
                active: 'financing-mode',
                active_tab: 'default',
                page_title: 'Financing mode',
                breadcrumb: [
                    {
                        text: 'Dashboard',
                        link: '/dashboard',
                    },
                    {
                        text: 'Financing mode',
                        link: '/',
                    },
                ],
            },
        },
        {
            ...murabehaRoutes,
        },
    ],
}
