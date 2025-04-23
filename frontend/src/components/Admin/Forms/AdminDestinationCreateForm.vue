<template>
    <div class="container">
        <h2>Add new destination</h2>
        <form class="entry-form" @submit.prevent="submitEntry">
            <div v-for="label in labels" class="form-group">
                <label :for="label.id">{{ label.label }}</label>
                <input v-if="label.type === 'text'" type="text" :id="label.id" v-model="newEntry[label.id]" required>
                <textarea v-else-if="label.type === 'textarea'" :id="label.id" v-model="newEntry[label.id]" required></textarea>
                <input v-else-if="label.type === 'number'" type="number" :id="label.id" v-model="newEntry[label.id]" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="submit-btn">Save Entry</button>
            </div>
        </form>
    </div>
</template>

<script setup>
import axios from "axios";
import {reactive, ref} from "vue";
import router from "../../../router";

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

const newEntry = reactive({
    name: '',
    description: '',
    distance: '',
    ett: ''
});

const submitEntry = async () => {
    try {
        const response = await axios.post('/api/admin/destination', newEntry);
        if (response) {
            resetForm();
            await router.push('/admin/destination');
        }
    } catch (error) {
        console.error('Error submitting form:', error);
    }
}

const resetForm = () => {
    Object.keys(newEntry).forEach(key => {
        newEntry[key] = '';
    });
}

</script>

<style scoped>

</style>