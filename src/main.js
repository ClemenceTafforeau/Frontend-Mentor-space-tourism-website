import { createApp } from 'vue';

import App from './App.vue';

import router from './router';

import '@/assets/styles/helpers.css';
import '@/assets/styles/reset.css';
import '@/assets/styles/style.css';

const app = createApp(App);

app.use(router);

app.mount('#app');