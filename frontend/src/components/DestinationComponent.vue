<template>
    <div class="destination-wrapper" v-if="destinations.length > 0">
        <h1 class="h1-secondary">
            <span aria-hidden="true">01</span>
            <span>Pick your destination</span>
        </h1>
        <transition name="fade" mode="out-in">
            <div class="destination-img" :key="selectedDestination.name">
                <img
                    :src="backendUrl + '/storage/img/' + selectedDestination.picture_webp"
                    :alt="selectedDestination.name"
                />
            </div>
        </transition>
        <ul class="destination_list">
            <li ref="destinationLinks" class="destination_item" v-for="(destination, index) in destinations" :key="destination.name" :class="{ 'destination-active': selectedDestinationIndex === index }">
                <button @click="selectDestination(index)" class="destination_link">{{ destination.name }}</button>
            </li>
            <li ref="destinationUnderline" class="destination-underline" tabindex="-1" aria-hidden="true"></li>
        </ul>

        <section class="destination-section">
            <div class="destination-choice">
                <transition name="fade" mode="out-in">
                    <div class="destination-name-desc" :key="selectedDestination.name">
                        <h2 class="h2-destination">{{ selectedDestination.name }}</h2>
                        <p>{{ selectedDestination.description }}</p>
                    </div>
                </transition>
                <hr>
                <div class="destination-info-container">
                    <div class="destination-info">
                        <h3>Avg. distance</h3>
                        <transition name="fade" mode="out-in">
                            <p :key="selectedDestination.name">{{ formatDistance(selectedDestination.distance) }}</p>
                        </transition>
                    </div>
                    <div class="destination-info">
                        <h3>Est. travel time</h3>
                        <transition name="fade" mode="out-in">
                            <p :key="selectedDestination.name">{{ formatDays(selectedDestination.ett) }}</p>
                        </transition>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { formatDistance, formatDays } from "../helpers/formatData";

const destinations = ref([]);

const backendUrl = import.meta.env.VITE_BACKEND_URL;

const fetchDestinations = async() => {
    try {
        const response = await axios.get('/api/destination');
        destinations.value = response.data;
        selectDestination(0);
    } catch (error) {
        console.error('Error fetching destinations.', error);
    }
}

const selectedDestination = ref(destinations.value[0]);
const selectedDestinationIndex = ref(0);

const destinationLinks = ref([]);
const destinationUnderline = ref(null);

function selectDestination(index) {
    selectedDestination.value = destinations.value[index];
    selectedDestinationIndex.value = index;
}

function moveDestinationUnderline(destinationLink) {
    const linkRect = destinationLink.getBoundingClientRect();
    const navRect = destinationLink.closest('ul').getBoundingClientRect();

    if (destinationUnderline.value) {
        destinationUnderline.value.style.width = `${linkRect.width}px`;
        destinationUnderline.value.style.left = `${linkRect.left - navRect.left}px`;
    }
}

function resetUnderline() {
    const activeLink = destinationLinks.value[selectedDestinationIndex.value];
    if (activeLink) moveDestinationUnderline(activeLink);
}

function setupEventListeners() {
    destinationLinks.value.forEach((link, index) => {
        link.addEventListener('mouseover', () => {
            destinationLinks.value.forEach(l => l.classList.remove('destination-hover'));
            link.classList.add('destination-hover');
            moveDestinationUnderline(link);
        });

        link.addEventListener('mouseout', resetUnderline);

        link.addEventListener('click', () => {
            destinationLinks.value.forEach(l => l.classList.remove('destination-active', 'destination-hover'));
            link.classList.add('destination-active');
            selectDestination(index);
            moveDestinationUnderline(link);
        });

        link.firstElementChild?.addEventListener('focus', () => moveDestinationUnderline(link));
        link.firstElementChild?.addEventListener('blur', resetUnderline);
    });
}

function cleanupEventListeners() {
    destinationLinks.value.forEach(link => {
        link.replaceWith(link.cloneNode(true)); // Easiest way to strip all listeners
    });
}

onMounted(async() => {
    await fetchDestinations();
    resetUnderline();
    setupEventListeners();
});

onBeforeUnmount(() => {
    cleanupEventListeners();
});
</script>

<style src="@/assets/styles/helpers.css"></style>
<style src="@/assets/styles/reset.css"></style>
<style src="@/assets/styles/style.css"></style>