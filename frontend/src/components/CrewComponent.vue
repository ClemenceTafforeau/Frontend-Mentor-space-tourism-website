<template>
    <div class="crew-wrapper" v-if="crewMembers.length > 0">
        <h1 class="h1-secondary">
            <span aria-hidden="true">02</span>
            <span>Meet your crew</span>
        </h1>
        <transition name="fade" mode="out-in">
            <div class="crew-img" :key="selectedCrewMember.first_name">
                <img
                    :src="backendUrl + '/storage/img/' + selectedCrewMember.picture_webp"
                    :alt="selectedCrewMember.name"
                />
            </div>
        </transition>
        <hr>
        <ul class="crew_list">
            <li class="crew_item" v-for="(member, index) in crewMembers" :key="index" @click="selectMember(index)" :class="{ 'crew-active': selectedCrewIndex === index }">
                <button class="crew_link"></button>
            </li>
        </ul>
        <transition name="fade" mode="out-in">
            <section class="crew-section" :key="selectedCrewMember.first_name">
                <div class="crew-choice">
                    <h2><span>{{ selectedCrewMember.rank }}</span><span>{{ selectedCrewMember.first_name + ' ' + selectedCrewMember.last_name }}</span></h2>
                    <p>{{ selectedCrewMember.biography }}</p>
                </div>
            </section>
        </transition>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from 'vue';

const crewMembers = ref([]);

const backendUrl = import.meta.env.VITE_BACKEND_URL;

const selectMember = (index) => {
    selectedCrewMember.value = crewMembers.value[index];
    selectedCrewIndex.value = index;
};

const fetchCrewMembers = async() => {
    try {
        const response = await axios.get(`/api/crew`);
        crewMembers.value = response.data;
        selectMember(0);
    } catch (error) {
        console.error('Error fetching crew members.', error);
    }
};

const selectedCrewMember = ref(crewMembers.value[0]);
const selectedCrewIndex = ref(0);

onMounted(async () => {
    await fetchCrewMembers();
});
</script>