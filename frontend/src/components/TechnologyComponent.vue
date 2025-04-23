<template>
    <div class="technology-wrapper" v-if="technologies.length > 0">
        <h1 class="h1-secondary">
            <span aria-hidden="true">03</span>
            <span>Space launch 101</span>
        </h1>
        <transition name="fade" mode="out-in">
            <picture class="technology-img" :key="selectedTechnology.name">
                <source media="(min-width:1280px)" :srcset="backendUrl + '/storage/img/' + selectedTechnology.picture_portrait">
                <img  
                    :src="backendUrl + '/storage/img/' + selectedTechnology.picture_landscape"
                    :alt="selectedTechnology.name" 
                />
            </picture>
        </transition>
        <ul class="technology_list">
            <li class="technology_item"  v-for="(technology, index) in technologies" :key="index" @click="selectTechnology(index)" :class="{ 'technology-active': selectedTechnologyIndex === index }">
                <button class="technology_link">{{ index + 1 }}</button>
            </li>
        </ul>
    
        <section class="technology-section">
                <h2>
                    <span>The terminology...</span>
                    <transition name="fade" mode="out-in">
                        <span :key="selectedTechnology.name">{{ selectedTechnology.name }}</span>
                    </transition>
                </h2>
            <transition name="fade" mode="out-in">
                <p :key="selectedTechnology.name">{{ selectedTechnology.description }}</p>
            </transition>
        </section>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from 'vue';

const technologies = ref([]);

const backendUrl = import.meta.env.VITE_BACKEND_URL;

const selectTechnology = (index) => {
    selectedTechnology.value = technologies.value[index];
    selectedTechnologyIndex.value = index;
};

const fetchTechnologies = async() => {
    try {
        const response = await axios.get('/api/technology');
        technologies.value = response.data;
        selectTechnology(0);
    } catch (error) {
        console.error('Error fetching technologies.', error);
    }
};

const selectedTechnology = ref(technologies.value[0]);
const selectedTechnologyIndex = ref(0);

onMounted(async () => {
    await fetchTechnologies();
});
</script>