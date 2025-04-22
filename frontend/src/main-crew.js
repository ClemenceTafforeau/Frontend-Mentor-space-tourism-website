import { createApp } from 'vue';

import CrewComponent from '@/components/CrewComponent.vue';

import router from './router';

import '@/assets/styles/helpers.css';
import '@/assets/styles/reset.css';
import '@/assets/styles/style.css'; // Import your global CSS

const app = createApp(CrewComponent);

app.use(router);

app.mount('#crew-app');
