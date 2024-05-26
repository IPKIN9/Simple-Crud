import { createRouter, createWebHistory } from "vue-router"
import Home from "../vue/pages/Home.vue"
import Users from "../vue/pages/Users.vue"
const routes = [
    {
        path: "/",
        name: "home",
        component: Home // Use the imported Home component
    },
    {
        path: "/users",
        name: "users",
        component: Users // Use the imported Users component
    }
]

export default createRouter({
    linkActiveClass: 'text-write',
    history: createWebHistory(),
    routes
})