import { createRouter, createWebHistory } from 'vue-router';
import HomeComponent from '../components/HomeComponent.vue';
import CrewComponent from '../components/CrewComponent.vue';
import DestinationComponent from "../components/DestinationComponent.vue";
import TechnologyComponent from '../components/TechnologyComponent.vue';
import LoginComponent from "../components/Auth/LoginComponent.vue";
import DashboardComponent from "../components/Auth/DashboardComponent.vue";
import AdminCrewComponent from "../components/Admin/AdminCrewComponent.vue";
import AdminDestinationComponent from "../components/Admin/AdminDestinationComponent.vue";
import AdminTechnologyComponent from "../components/Admin/AdminTechnologyComponent.vue";
import AdminCrewCreateForm from "../components/Admin/Forms/AdminCrewCreateForm.vue";
import AdminCrewEditForm from "../components/Admin/Forms/AdminCrewEditForm.vue";

const routes = [
    { path: '/', component: HomeComponent, meta: { bodyClass: 'home-body', title: 'Home - Space travel website' }  },
    { path: '/crew', component: CrewComponent, meta: { bodyClass: 'crew-body', title: 'Crew - Space travel website' }  },
    { path: '/destination', component: DestinationComponent, meta: { bodyClass: 'destination-body', title: 'Destination - Space travel website' }  },
    { path: '/technology', component: TechnologyComponent, meta: { bodyClass: 'technology-body', title: 'Technology - Space travel website' }  },
    { path: '/login', component: LoginComponent, meta: { bodyClass: 'login-body', title: 'Login - Space travel website' }  },
    { path: '/dashboard', component: DashboardComponent, meta: { bodyClass: 'dashboard-body', title: 'Dashboard - Space travel website' }  },
    { path: '/admin/crew', component: AdminCrewComponent, meta: { bodyClass: 'admin-body', title: 'Crew dashboard - Space travel website' }  },
    { path: '/admin/crew/create', component: AdminCrewCreateForm, meta: { bodyClass: 'admin-body', title: 'Create crew member - Space travel website' }  },
    { path: '/admin/crew/:id', component: AdminCrewEditForm, meta: { bodyClass: 'admin-body', title: 'Edit crew member - Space travel website' }  },
    { path: '/admin/destination', component: AdminDestinationComponent, meta: { bodyClass: 'admin-body', title: 'Destination dashboard - Space travel website' }  },
    { path: '/admin/technology', component: AdminTechnologyComponent, meta: { bodyClass: 'admin-body', title: 'Technology dashboard - Space travel website' }  },
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
