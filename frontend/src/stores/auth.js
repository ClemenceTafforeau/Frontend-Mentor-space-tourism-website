import { defineStore } from 'pinia';
import {computed, ref} from 'vue';
import axios from 'axios';

export const useAuthStore = defineStore('auth', () => {
    const user = ref(null);
    const token = ref(localStorage.getItem('auth_token') || null);

    async function login(token) {
        try {
            const response = await axios.get('/api/user', {
                headers: { "Authorization": `Bearer ${token}` }
            });
            setUser(response.data);
            setToken(token);
        } catch (error) {
            user.value = null;
            console.error('Error fetching user data:', error)
        }
    }

    const setUser = (userData) => {
        user.value = userData;
    }

    const setToken = (newToken) => {
        token.value = newToken;
        localStorage.setItem('auth_token', newToken);
    }

    const loadToken = () => {
        const token = localStorage.getItem('auth_token');
        if (token.value) {
            token.value = token;
        }
    }

    const logout = () => {
        token.value = null;
        user.value = null;
        localStorage.removeItem('auth_token');
    }

    const isAuthenticated = computed(() => !!token.value);

    const getUser = async () => {
        if (token.value) {
            try {
                const response = await axios.get('/api/user', {
                    headers: {
                        'Authorization': `Bearer ${token.value}`,
                    },
                });
                setUser(response.data);
            } catch (error) {
                console.error('Error fetching user data:', error);
            }
        }
    };

    return { user, token, login, setUser, setToken, loadToken, logout, isAuthenticated, getUser };
});
