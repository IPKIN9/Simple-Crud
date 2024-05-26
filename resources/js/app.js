import './bootstrap';
import router from "./router";
import {createApp} from 'vue';

import App from '../vue/App.vue';

createApp(App).use(router).mount('#app');
