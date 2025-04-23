<template>
    <div class="container">
        <h2>Edit technology</h2>
        <form class="entry-form" @submit.prevent="submitEntry(id)">
            <div v-for="label in labels" class="form-group">
                <label :for="label.id">{{ label.label }}</label>
                <input v-if="label.type === 'text'" type="text" :id="label.id" v-model="currentEntry[label.id]" required>
                <textarea v-else-if="label.type === 'textarea'" :id="label.id" v-model="currentEntry[label.id]" required></textarea>
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
    }
});

const currentEntry = reactive({
    name: '',
    description: ''
});

const submitEntry = async (id) => {
    try {
        const response = await axios.put(`/api/admin/technology/${id}`, currentEntry);
        if (response) {
            resetForm();
            await router.push('/admin/technology');
        }
    } catch (error) {
        console.error('Error submitting form:', error);
    }
}

const getData = async (id) => {
    try {
        const response = await axios.get(`/api/admin/technology/${id}`);
        const data = response.data;
        
        currentEntry.name = data.name;
        currentEntry.description = data.description;
    } catch (error) {
        console.error('Failed to fetch technology.', error);
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