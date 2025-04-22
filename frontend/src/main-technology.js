import { createApp } from 'vue';

import TechnologyComponent from './components/TechnologyComponent.vue';

import router from './router';

import '@/assets/styles/helpers.css';
import '@/assets/styles/reset.css';
import '@/assets/styles/style.css'; // Import your global CSS

const app = createApp(TechnologyComponent);

app.use(router);

app.mount('#technology-app');
