import { createApp } from 'vue';
import { createPinia } from 'pinia';
import axios from 'axios';

import App from './App.vue';
import router from './router';

import { useAuthStore } from './stores/auth';
import './lib/axios/axios-interceptor';

import '@/assets/styles/helpers.css';
import '@/assets/styles/reset.css';
import '@/assets/styles/style.css';

const app = createApp(App);

const pinia = createPinia();
app.use(pinia);

axios.defaults.baseURL = import.meta.env.VITE_BACKEND_URL;

const authStore = useAuthStore();

if (authStore.token) {
    axios.defaults.headers.common['Authorization'] = `Bearer ${authStore.token}`;
    authStore.getUser();
}

app.use(router);
app.mount('#app');
