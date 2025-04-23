<template>
    <div class="container">
        <h2>Add new crew member</h2>
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
    rank: {
        id: 'rank',
        label: 'Rank',
        type: 'text'
    },
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
    biography: {
        id: 'biography',
        label: 'Biography',
        type: 'textarea'
    }
});

const newEntry = reactive({
    rank: '',
    first_name: '',
    last_name: '',
    biography: ''
});

const submitEntry = async () => {
    try {
        const response = await axios.post('/api/admin/crew', newEntry);
        if (response) {
            resetForm();
            await router.push('/admin/crew');
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