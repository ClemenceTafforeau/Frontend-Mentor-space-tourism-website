<template>
    <header ref="header" :class="authStore.isAuthenticated ? 'header-user' : 'header-general'">
        <a href="/" class="logo_link">
            <svg class="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" aria-hidden="true">
                <g fill="none" fill-rule="evenodd">
                    <circle cx="24" cy="24" r="24" fill="#FFF"/>
                    <path fill="#0B0D17" d="M24 0c0 16-8 24-24 24 15.718.114 23.718 8.114 24 24 0-16 8-24 24-24-16 0-24-8-24-24z"/>
                </g>
            </svg>
        </a>
        <nav v-if="!authStore.isAuthenticated" ref="nav" class="navigation">
            <ul class="nav_list">
                <li class="nav_item">
                    <router-link class="nav_link" to="/"><span class="nav_item-number" aria-hidden="true">00</span>Home</router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link" to="/destination"><span class="nav_item-number" aria-hidden="true">01</span>Destination</router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link" to="/crew"><span class="nav_item-number" aria-hidden="true">02</span>Crew</router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link" to="/technology"><span class="nav_item-number" aria-hidden="true">03</span>Technology</router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link" to="/login"><span class="nav_item-number" aria-hidden="true">04</span>Login</router-link>
                </li>
                <li ref="underline" class="underline" tabindex="-1" aria-hidden="true"></li>
            </ul>
        </nav>
        <nav v-else ref="nav" class="navigation">
            <ul class="nav_list">
                <li class="nav_item">
                    <router-link class="nav_link" to="/dashboard"><span class="nav_item-number" aria-hidden="true">00</span>Dashboard</router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link" to="/admin/destination"><span class="nav_item-number" aria-hidden="true">01</span>Destinations</router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link" to="/admin/crew"><span class="nav_item-number" aria-hidden="true">02</span>Crew</router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link" to="/admin/technology"><span class="nav_item-number" aria-hidden="true">03</span>Technologies</router-link>
                </li>
                <li class="nav_item">
                    <router-link class="nav_link" to="/admin/user"><span class="nav_item-number" aria-hidden="true">04</span>Users</router-link>
                </li>
                <li class="nav_item">
                    <form @submit.prevent="handleLogout">
                        <button class="nav_link"><span class="nav_item-number" aria-hidden="true">05</span>Logout</button>
                    </form>
                </li>
                <li ref="underline" class="underline" tabindex="-1" aria-hidden="true"></li>
            </ul>
        </nav>
        <button class="menu-btn" ref="menu" aria-label="Open the menu">
            <svg viewBox="0 0 100 100">
                <path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                <path class="line line2" d="M 20,50 H 80" />
                <path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
            </svg>
        </button>
    </header>
</template>

<script setup>
import {nextTick, onBeforeUnmount, onMounted, ref, watch} from "vue";
import {useRoute} from 'vue-router';
import {useAuthStore} from "../stores/auth";
import axios from "axios";
import router from "../router";

const route = useRoute();
const authStore = useAuthStore();

const menu = ref(null);
const nav = ref(null);
const underline = ref(null);
const navLinks = ref([]);

const handleLogout = async () => {
    try {
        const response = await axios.post('/api/logout');

        if (response.data.success) {
            authStore.logout();
            await router.push('/');
        }
    } catch (error) {
        if (error.response) {
            console.error('Logging out failed:', error.response.data.message);
        }
    }
}

function initializeEventListeners() {
    if (menu.value) {
        menu.value.addEventListener('click', toggleMobileMenu);
    }
    window.addEventListener('scroll', handleScroll);

    navLinks.value.forEach(link => {
        const handleMouseOver = () => moveUnderline(link);
        const handleFocus = () => moveUnderline(link);
        const handleMouseOut = () => {
            const activeLink = navLinks.value.find(l => l.classList.contains('router-link-active'));
            if (activeLink) moveUnderline(activeLink);
        };
        const handleClick = () => {
            navLinks.value.forEach(l => l.classList.remove('router-link-active'));
            link.classList.add('router-link-active');
            moveUnderline(link);
        };

        link.addEventListener('mouseover', handleMouseOver);
        link.firstElementChild?.addEventListener('focus', handleFocus);
        link.addEventListener('mouseout', handleMouseOut);
        link.addEventListener('click', handleClick);

        // Save listeners for cleanup
        listeners.push({ link, handleMouseOver, handleFocus, handleMouseOut, handleClick });
    });

    window.addEventListener('DOMContentLoaded', moveUnderlineOnLoad);
}

function cleanupEventListeners() {
    if (menu.value) {
        menu.value.removeEventListener('click', toggleMobileMenu);
    }
    window.removeEventListener('scroll', handleScroll);

    listeners.forEach(({ link, handleMouseOver, handleFocus, handleMouseOut, handleClick }) => {
        link.removeEventListener('mouseover', handleMouseOver);
        link.firstElementChild?.removeEventListener('focus', handleFocus);
        link.removeEventListener('mouseout', handleMouseOut);
        link.removeEventListener('click', handleClick);
    });

    window.removeEventListener('DOMContentLoaded', moveUnderlineOnLoad);

    listeners.length = 0;
}

function handleScroll() {
    const header = document.querySelector('header');
    if (window.scrollY > 0) {
        header?.classList.add('blurred-backdrop');
    } else {
        header?.classList.remove('blurred-backdrop');
    }
}

function toggleMobileMenu() {
    if (!menu.value || !nav.value) return;

    nav.value.classList.toggle('nav-slide');
    menu.value.classList.toggle('opened');

    const isOpened = menu.value.classList.contains('opened');
    menu.value.setAttribute('aria-expanded', isOpened);
    nav.value.setAttribute('aria-expanded', isOpened);
}

function moveUnderlineOnLoad() {
    const activeLink = navLinks.value.find(l => l.classList.contains('router-link-active'));
    if (activeLink) {
        moveUnderline(activeLink);
    } else if (navLinks.value.length > 0) {
        moveUnderline(navLinks.value[0]);
    }
}

function moveUnderline(link) {
    if (!link || !underline.value) return;

    const linkRect = link.getBoundingClientRect();
    const navRect = link.closest('ul')?.getBoundingClientRect();

    if (navRect) {
        underline.value.style.width = `${linkRect.width}px`;
        underline.value.style.left = `${linkRect.left - navRect.left}px`;
    }
}

const listeners = [];

onMounted(async () => {
    await nextTick();
    navLinks.value = Array.from(nav.value?.querySelectorAll('.nav_link') || []);

    initializeEventListeners();
    moveUnderlineOnLoad();
});

onBeforeUnmount(() => {
    cleanupEventListeners();
});

watch(
    () => route.fullPath,
    () => {
        if (nav.value?.getAttribute('aria-expanded') === 'true') {
            toggleMobileMenu();
        }
    }
);

</script>