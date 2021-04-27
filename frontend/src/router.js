import router from 'vue-router'
import HelloWorld from "./components/HelloWorld";

export default router.createRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes: [
        { path: '/', component: HelloWorld },
    ]
})