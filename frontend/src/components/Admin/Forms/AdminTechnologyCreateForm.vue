<template>
    <div class="container">
        <h2>Add new technology</h2>
        <form class="entry-form" @submit.prevent="submitEntry">
            <div v-for="label in labels" class="form-group">
                <label :for="label.id">{{ label.label }}</label>
                <input v-if="label.type === 'text'" type="text" :id="label.id" v-model="newEntry[label.id]" required>
                <textarea v-else-if="label.type === 'textarea'" :id="label.id" v-model="newEntry[label.id]" required></textarea>
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
});

const newEntry = reactive({
    name: '',
    description: '',
});

const submitEntry = async () => {
    try {
        const response = await axios.post('/api/admin/technology', newEntry);
        if (response) {
            resetForm();
            await router.push('/admin/technology');
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