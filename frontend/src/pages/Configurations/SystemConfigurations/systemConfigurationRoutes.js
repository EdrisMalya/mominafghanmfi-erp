export const systemConfigurationRoutes = {
    path: '/configurations/system-configurations',
    component: () =>
        import(
            'pages/Configurations/SystemConfigurations/SystemConfigurationsLayout.vue'
        ),
    children: [
        {
            path: '',
            component: () =>
                import(
                    'pages/Configurations/SystemConfigurations/SystemConfigurationsPage.vue'
                ),
            meta: {
                active: 'system_configurations',
                active_tab: 'default',
                breadcrumb: [
                    {
                        text: 'Configurations',
                        link: '/configurations',
                    },
                    {
                        text: 'System Configurations',
                        link: '/',
                    },
                ],
            },
        },
        {
            path: 'branch-configurations',
            component: () =>
                import(
                    'pages/Configurations/SystemConfigurations/BranchConfigurations/BranchConfigurationsPage.vue'
                ),
            meta: {
                active: 'system_configurations',
                active_tab: 'branch-configurations',
                breadcrumb: [
                    {
                        text: 'Configurations',
                        link: '/configurations',
                    },
                    {
                        text: 'System Configurations',
                        link: '/',
                    },
                ],
            },
        },
    ],
}
