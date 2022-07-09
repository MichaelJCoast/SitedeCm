<<<<<<< HEAD
import { createApp } from 'vue'
import store from './store'
import router from './router'
import App from './App.vue'
import './index.css'

createApp(App)
    .use(store)
    .use(router)
    .mount('#app')
=======
import { createApp } from "vue";
import store from "./store";
import './index.css'
import App from "./App.vue";

createApp(App).use(store).mount("#app");
>>>>>>> 1cb0577 (Vue 3 installation)
