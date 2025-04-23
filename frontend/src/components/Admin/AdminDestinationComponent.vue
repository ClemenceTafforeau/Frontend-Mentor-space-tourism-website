<template>
    <div class="container" v-if="destinations.data?.length > 0">
        <router-link to="/admin/destination/create" class="add-btn">Add Entry</router-link>

        <table class="data-table">
            <thead>
            <tr>
                <th v-for="label in Object.values(labels)">{{ label }}</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="destination in destinations.data">
                <td>{{ destination.id }}</td>
                <td>{{ destination.name }}</td>
                <td>{{ destination.description }}</td>
                <td>{{ destination.distance }}</td>
                <td>{{ destination.ett }}</td>
                <td>
                    <div class="btn-container">
                        <button @click="handleEdit(destination.id)" class="edit-btn">Edit</button>
                        <button @click="handleDelete(destination.id)" class="delete-btn">Delete</button>
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

const destinations = ref([]);
const labels = ref({
    id: 'Id',
    name: 'Name',
    description: 'Description',
    distance: 'Distance',
    ett: 'Estimated travel time'
});

const getDestinations = async () => {
    try {
        const response = await axios.get(`/api/admin/destination`);
        destinations.value = response.data;
    } catch (error) {
        console.error('Error fetching destinations.', error);
    }
}

const handleDelete = async (id) => {
    try {
        await axios.delete(`/api/admin/destination/${id}`);
        await getDestinations();
    } catch (error) {
        console.error('Error deleting destination.', error);
    }
}

const handleEdit = (id) => {
    router.push(`/admin/destination/${id}`);
}

onMounted(async () => {
    await getDestinations();
})
</script>

<style scoped>

</style>