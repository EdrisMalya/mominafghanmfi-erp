import { userManagementRoutes } from 'pages/UserManagement/userManagementRoutes'
import { configurationRoutes } from 'pages/Configurations/configurationRoutes'
import { customerServicesRoutes } from 'pages/CustomerServices/customerServicesRoutes'
import { financingModeRoutes } from 'pages/FinancingMode/financingModeRoutes'

const routes = [
    {
        path: '/',
        component: () => import('layouts/MainLayout.vue'),
        children: [
            { path: '', component: () => import('pages/IndexPage.vue') },
            { ...customerServicesRoutes },
            { ...financingModeRoutes },
            { ...userManagementRoutes },
            { ...configurationRoutes },
        ],
    },

    {
        path: '/login',
        component: () => import('pages/LoginPage.vue'),
    },

    {
        path: '/server-error',
        component: () => import('pages/ServerErrorPage.vue'),
    },
    {
        path: '/forbidden',
        component: () => import('pages/ForbiddenPage.vue'),
    },

    // Always leave this as last one,
    // but you can also remove it
    {
        path: '/:catchAll(.*)*',
        component: () => import('pages/ErrorNotFound.vue'),
    },
]

export default routes
