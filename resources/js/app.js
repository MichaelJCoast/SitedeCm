import { createApp } from 'vue'
import store from './store'
import router from './router'
import App from './App.vue'
import mitt from "mitt";

const emitter = mitt();

const app = createApp(App);
app.config.globalProperties.emitter = emitter;
app.use(store)
app.use(router)
app.mount("#app");

/* createApp(App)
    .use(store)
    .use(router)
    .mount('#app') */