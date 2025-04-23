import { createRouter, createWebHistory } from 'vue-router';
import HomeComponent from '../components/HomeComponent.vue';
import CrewComponent from '../components/CrewComponent.vue';
import DestinationComponent from "../components/DestinationComponent.vue";
import TechnologyComponent from '../components/TechnologyComponent.vue';
import LoginComponent from "../components/Auth/LoginComponent.vue";
import DashboardComponent from "../components/Auth/DashboardComponent.vue";

const routes = [
    { path: '/', component: HomeComponent, meta: { bodyClass: 'home-body', title: 'Home - Space travel website' }  },
    { path: '/crew', component: CrewComponent, meta: { bodyClass: 'crew-body', title: 'Crew - Space travel website' }  },
    { path: '/destination', component: DestinationComponent, meta: { bodyClass: 'destination-body', title: 'Destination - Space travel website' }  },
    { path: '/technology', component: TechnologyComponent, meta: { bodyClass: 'technology-body', title: 'Technology - Space travel website' }  },
    { path: '/login', component: LoginComponent, meta: { bodyClass: 'login-body', title: 'Login - Space travel website' }  },
    { path: '/dashboard', component: DashboardComponent, meta: { bodyClass: 'dashboard-body', title: 'Dashboard - Space travel website' }  },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Add a navigation guard to update the body class based on route meta
router.beforeEach((to, from, next) => {
    const body = document.body;
    const defaultClass = 'default-body-class'; // In case you need a fallback class
    
    document.title = to.meta.title || 'Space travel website'; // Fallback title

    if (to.meta.bodyClass) {
      body.className = to.meta.bodyClass;
    } else {
      body.className = defaultClass;
    }
    
    next();
});

export default router;
