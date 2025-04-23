<template>
    <form @submit.prevent="handleLogin(email, password)">
        <h1 class="h1-secondary">Login</h1>

        <div class="form-group">
            <label for="email">Email</label>
            <input
                v-model="email"
                type="email"
                id="email"
                required
                placeholder="Enter your email"
            />
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input
                v-model="password"
                type="password"
                id="password"
                required
                placeholder="Enter your password"
            />
        </div>

        <button type="submit">Login</button>
    </form>
</template>

<script setup>
import {ref} from "vue";
import axios from "axios";
import {useRouter} from "vue-router";
import {useAuthStore} from "../../stores/auth";

const router = useRouter();
const authStore = useAuthStore();

const email = ref('');
const password = ref('');

const handleLogin = async (email, password) => {
    try {
        const response = await axios.post('/api/login', { email, password });

        if (response.data.success) {
            await authStore.login(response.data.token);
            await router.push('/dashboard');
        }
    } catch (error) {
        if (error.response) {
            if (error.response.status === 401) {
                console.error('Authentication failed:', error.response.data.message);
            } else if (error.response.status === 422) {
                console.error('Validation error:', error.response.data.errors);
            }
        }
    }
}
</script>

<style scoped>

</style>