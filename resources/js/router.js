import { createRouter, createWebHistory } from "vue-router"
import Home from "../vue/pages/Home.vue"
const routes = [
    {
        path: "/",
        name: "home",
        component: Home // Use the imported Home component
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})