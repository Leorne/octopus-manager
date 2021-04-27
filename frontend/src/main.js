import { createApp } from 'vue'
import store from './store'
import router from './router.js'
import App from './App.vue'

const app = createApp(App);

app.use(store)
app.use(router)

app.config.devtools = true;


app.mount('#app')
