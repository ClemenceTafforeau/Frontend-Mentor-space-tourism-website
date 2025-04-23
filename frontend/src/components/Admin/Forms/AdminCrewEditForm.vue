<template>
    <div class="container">
        <h2>Edit crew member</h2>
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

const currentEntry = reactive({
    rank: '',
    first_name: '',
    last_name: '',
    biography: ''
});

const submitEntry = async (id) => {
    try {
        const response = await axios.put(`/api/admin/crew/${id}`, currentEntry);
        if (response) {
            resetForm();
            await router.push('/admin/crew');
        }
    } catch (error) {
        console.error('Error submitting form:', error);
    }
}

const getData = async (id) => {
    try {
        const response = await axios.get(`/api/admin/crew/${id}`);
        const data = response.data;
        
        currentEntry.rank = data.rank;
        currentEntry.first_name = data.first_name;
        currentEntry.last_name = data.last_name;
        currentEntry.biography = data.biography;
    } catch (error) {
        console.error('Failed to fetch crew member.', error);
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