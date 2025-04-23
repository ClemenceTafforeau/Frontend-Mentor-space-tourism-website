<template>
    <div class="container">
        <h2>Edit destination</h2>
        <form class="entry-form" @submit.prevent="submitEntry(id)">
            <div v-for="label in labels" class="form-group">
                <label :for="label.id">{{ label.label }}</label>
                <input v-if="label.type === 'text'" type="text" :id="label.id" v-model="currentEntry[label.id]" required>
                <textarea v-else-if="label.type === 'textarea'" :id="label.id" v-model="currentEntry[label.id]" required></textarea>
                <input v-else-if="label.type === 'number'" type="number" :id="label.id" v-model="currentEntry[label.id]" required>
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
    name: {
        id: 'name',
        label: 'Name',
        type: 'text'
    },
    description: {
        id: 'description',
        label: 'Description',
        type: 'textarea'
    },
    distance: {
        id: 'distance',
        label: 'Distance',
        type: 'number'
    },
    ett: {
        id: 'ett',
        label: 'Estimated travel time',
        type: 'number'
    }
});

const currentEntry = reactive({
    name: '',
    description: '',
    distance: '',
    ett: ''
});

const submitEntry = async (id) => {
    try {
        const response = await axios.put(`/api/admin/destination/${id}`, currentEntry);
        if (response) {
            resetForm();
            await router.push('/admin/destination');
        }
    } catch (error) {
        console.error('Error submitting form:', error);
    }
}

const getData = async (id) => {
    try {
        const response = await axios.get(`/api/admin/destination/${id}`);
        const data = response.data;
        
        currentEntry.name = data.name;
        currentEntry.description = data.description;
        currentEntry.distance = data.distance;
        currentEntry.ett = data.ett;
    } catch (error) {
        console.error('Failed to fetch destination.', error);
    }
}

const resetForm = () => {
    Object.keys(currentEntry).forEach(key => {
        currentEntry[key] = '';
    });
}

onMounted(async () => {
    await getData(id);
})

</script>

<style scoped>

</style>