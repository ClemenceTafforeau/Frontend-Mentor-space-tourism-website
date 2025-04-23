<template>
    <div class="container" v-if="technologies.data?.length > 0">
        <router-link to="/admin/technology/create" class="add-btn">Add Entry</router-link>

        <table class="data-table">
            <thead>
            <tr>
                <th v-for="label in Object.values(labels)">{{ label }}</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="technology in technologies.data">
                <td>{{ technology.id }}</td>
                <td>{{ technology.name }}</td>
                <td>{{ technology.description }}</td>
                <td>
                    <div class="btn-container">
                        <button @click="handleEdit(technology.id)" class="edit-btn">Edit</button>
                        <button @click="handleDelete(technology.id)" class="delete-btn">Delete</button>
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

const technologies = ref([]);
const labels = ref({
    id: 'Id',
    name: 'Name',
    description: 'Description',
});

const getTechnologies = async () => {
    try {
        const response = await axios.get(`/api/admin/technology`);
        technologies.value = response.data;
    } catch (error) {
        console.error('Error fetching technologies.', error);
    }
}

const handleDelete = async (id) => {
    try {
        await axios.delete(`/api/admin/technology/${id}`);
        await getTechnologies();
    } catch (error) {
        console.error('Error deleting technology.', error);
    }
}

const handleEdit = (id) => {
    router.push(`/admin/technology/${id}`);
}

onMounted(async () => {
    await getTechnologies();
})
</script>

<style scoped>

</style>