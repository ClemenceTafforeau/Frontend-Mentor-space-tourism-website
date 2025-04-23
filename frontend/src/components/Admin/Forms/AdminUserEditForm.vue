<template>
    <div class="container">
        <h2>Edit user member</h2>
        <form class="entry-form" @submit.prevent="submitEntry(id)">
            <div v-for="label in labels" class="form-group">
                <label :for="label.id">{{ label.label }}</label>
                <input v-if="label.type === 'text'" type="text" :id="label.id" v-model="currentEntry[label.id]" required>
                <input v-if="label.type === 'email'" type="email" :id="label.id" v-model="currentEntry[label.id]" required>
                <select v-if="label.type === 'select'" :id="label.id" v-model="currentEntry[label.id]" required>
                    <option v-for="role in roles">
                        {{ role }}
                    </option>
                </select>
                <input v-if="label.type === 'password'" type="password" :id="label.id" v-model="currentEntry[label.id]">
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-btn">Save Entry</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from "axios";
import {onMounted, reactive, ref} from "vue";
import router from "../../../router";
import {useRoute} from "vue-router";

const route = useRoute();
const id = route.params.id;

const labels = ref({
    first_name: {
        id: 'first_name',
        label: 'First name',
        type: 'text'
    },
    last_name: {
        id: 'last_name',
        label: 'Last name',
        type: 'text'
    },
    email: {
        id: 'email',
        label: 'Email',
        type: 'email'
    },
    role: {
        id: 'role',
        label: 'Role',
        type: 'select'
    },
    password: {
        id: 'password',
        label: 'Password',
        type: 'password'
    },
    password_confirmation: {
        id: 'password_confirmation',
        label: 'Password confirmation',
        type: 'password'
    },
});

const roles = ref([]);

const currentEntry = reactive({
    first_name: '',
    last_name: '',
    email: '',
    role: '',
    password: '',
    password_confirmation: ''
});

const submitEntry = async (id) => {
    try {
        if (!currentEntry.password) {
            delete currentEntry.password;
        }
        if (!currentEntry.password_confirmation) {
            delete currentEntry.password_confirmation;
        }
        const response = await axios.put(`/api/admin/user/${id}`, currentEntry);
        if (response) {
            resetForm();
            await router.push('/admin/user');
        }
    } catch (error) {
        console.error('Error submitting form:', error);
    }
}

const getData = async (id) => {
    try {
        const response = await axios.get(`/api/admin/user/${id}`);
        const data = response.data;

        currentEntry.first_name = data.first_name;
        currentEntry.last_name = data.last_name;
        currentEntry.email = data.email;
        currentEntry.role = data.role;
    } catch (error) {
        console.error('Failed to fetch user.', error);
    }
}

const getUserRoles = async () => {
    try {
        const response = await axios.get('/api/admin/roles');
        if (response) {
            roles.value = response.data.roles;
        }
    } catch (error) {
        console.error('Error fetching user roles:', error);
    }
}

const resetForm = () => {
    Object.keys(currentEntry).forEach(key => {
        currentEntry[key] = '';
    });
}

onMounted(async () => {
    await getData(id);
    await getUserRoles();
})

</script>

<style scoped>

</style>