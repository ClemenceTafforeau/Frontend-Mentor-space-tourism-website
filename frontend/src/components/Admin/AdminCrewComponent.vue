<template>
    <div class="container" v-if="crewMembers.data?.length > 0">
        <router-link to="/admin/crew/create" class="add-btn">Add Entry</router-link>

        <table class="data-table">
            <thead>
            <tr>
                <th v-for="label in Object.values(labels)">{{ label }}</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="crewMember in crewMembers.data">
                <td>{{ crewMember.id }}</td>
                <td>{{ crewMember.rank }}</td>
                <td>{{ crewMember.first_name }}</td>
                <td>{{ crewMember.last_name }}</td>
                <td>{{ crewMember.biography }}</td>
                <td>
                    <div class="btn-container">
                        <button @click="handleEdit(crewMember.id)" class="edit-btn">Edit</button>
                        <button @click="handleDelete(crewMember.id)" class="delete-btn">Delete</button>
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

const crewMembers = ref([]);
const labels = ref({
    id: 'Id',
    rank: 'Rank',
    first_name: 'First name',
    last_name: 'Last name',
    biography: 'Biography'
});

const getCrewMembers = async () => {
    try {
        const response = await axios.get(`/api/admin/crew`);
        crewMembers.value = response.data;
    } catch (error) {
        console.error('Error fetching crew members.', error);
    }
}

const handleDelete = async (id) => {
    try {
        await axios.delete(`/api/admin/crew/${id}`);
        await getCrewMembers();
    } catch (error) {
        console.error('Error deleting crew member.', error);
    }
}

const handleEdit = (id) => {
    router.push(`/admin/crew/${id}`);
}

onMounted(async () => {
    await getCrewMembers();
})
</script>

<style scoped>

</style>