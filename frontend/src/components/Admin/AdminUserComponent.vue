<template>
    <div class="container" v-if="users.data?.length > 0">
        <router-link to="/admin/user/create" class="add-btn">Add Entry</router-link>

        <table class="data-table">
            <thead>
            <tr>
                <th v-for="label in Object.values(labels)">{{ label }}</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="user in users.data">
                <td>{{ user.id }}</td>
                <td>{{ user.first_name }}</td>
                <td>{{ user.last_name }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.role }}</td>
                <td>
                    <div class="btn-container">
                        <button @click="handleEdit(user.id)" class="edit-btn">Edit</button>
                        <button @click="handleDelete(user.id)" class="delete-btn">Delete</button>
                    </div>
                </td>
            </tr>
            <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>
</template>

<script setup>
import {onMounted, ref} from "vue";
import axios from "axios";
import router from "../../router";

const users = ref([]);
const labels = ref({
    id: 'Id',
    first_name: 'First name',
    last_name: 'Last name',
    email: 'Email',
    role: 'Role',
});

const getUsers = async () => {
    try {
        const response = await axios.get(`/api/admin/user`);
        users.value = response.data;
    } catch (error) {
        console.error('Error fetching users.', error);
    }
}

const handleDelete = async (id) => {
    try {
        await axios.delete(`/api/admin/user/${id}`);
        await getUsers();
    } catch (error) {
        console.error('Error deleting users member.', error);
    }
}

const handleEdit = (id) => {
    router.push(`/admin/user/${id}`);
}

onMounted(async () => {
    await getUsers();
})
</script>

<style scoped>

</style>