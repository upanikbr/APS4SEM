import Vue from 'vue'
import VueRouter from 'vue-router'

import LoginScreen from '../pages/LoginScreen'
import RegisterScreen from '../pages/RegisterScreen'
import MainScreen from '../pages/MainScreen'

Vue.use(VueRouter)

const routes = [
    {
        name: 'LoginScreen',
        path: '/signin',
        component: LoginScreen
    },
    {
        name: 'RegisterScreen',
        path: '/register',
        component: RegisterScreen
    },
    {
        name: 'MainScreen',
        path: '/',
        component: MainScreen
    }
]

export default new VueRouter({mode: 'history',routes})