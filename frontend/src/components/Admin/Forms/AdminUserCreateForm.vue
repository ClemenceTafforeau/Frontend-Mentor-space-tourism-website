<template>
    <div class="container">
        <h2>Add new user</h2>
        <form class="entry-form" @submit.prevent="submitEntry">
            <div v-for="label in labels" class="form-group">
                <label :for="label.id">{{ label.label }}</label>
                <input v-if="label.type === 'text'" type="text" :id="label.id" v-model="newEntry[label.id]" required>
                <input v-if="label.type === 'email'" type="email" :id="label.id" v-model="newEntry[label.id]" required>
                <select v-if="label.type === 'select'" :id="label.id" v-model="newEntry[label.id]" required>
                    <option v-for="role in roles">
                        {{ role }}
                    </option>
                </select>
                <input v-if="label.type === 'password'" type="password" :id="label.id" v-model="newEntry[label.id]" required>
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

const newEntry = reactive({
    first_name: '',
    last_name: '',
    email: '',
    role: '',
    password: '',
    password_confirmation: ''
});

const submitEntry = async () => {
    try {
        const response = await axios.post('/api/admin/user', newEntry);
        if (response) {
            resetForm();
            await router.push('/admin/user');
        }
    } catch (error) {
        console.error('Error submitting form:', error);
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
    Object.keys(newEntry).forEach(key => {
        newEntry[key] = '';
    });
}

onMounted(async () => {
    await getUserRoles();
})

</script>

<style scoped>

</style>