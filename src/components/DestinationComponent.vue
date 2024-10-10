<template>
    <h1 class="h1-secondary">
        <span aria-hidden="true">01</span>
        <span>Pick your destination</span>
    </h1>
    <div class="destination-img"></div>
    <ul class="destination_list">
        <li class="destination_item" v-for="(destination, index) in destinations" :key="index" @click="selectedDestination(index)" :class="{ 'destination-active': selectedDestination === index }">
            <button class="destination_link">{{ destination.name }}</button>
        </li>
        <li class="destination-underline" tabindex="-1" aria-hidden="true"></li>
    </ul>
    <section class="destination-section">
        <div class="destination-choice">
            <div>
                <h2 class="h2-destination">{{ selectedDestination.name }}</h2>
                <p>{{ selectedDestination.description }}</p>    
            </div>
            <hr>
            <div class="destination-info-container">
                <div class="destination-info">
                    <h3>Avg. distance</h3>
                    <p>{{ selectedDestination.distance }}</p>
                </div>
                <div class="destination-info">
                    <h3>Est. travel time</h3>
                    <p>{{ selectedDestination.ett }}</p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import imageMoon from '@/assets/img/image-moon.webp';
    import imageMars from '@/assets/img/image-mars.webp';
    import imageEuropa from '@/assets/img/image-europa.webp';
    import imageTitan from '@/assets/img/image-titan.webp';

    export default {
        data() {
            return {
                selectedDestination: {}, // Stores the currently selected crew member
                selectedDestinationIndex: 0,   // Default to the first crew member (index 0)
                destinations: [
                    { picture: imageMoon, name: 'Moon', description: 'See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.', distance: '384,400 km', ett: '3 days' },
                    { picture: imageMars, name: 'Mars', description: 'Don’t forget to pack your hiking boots. You’ll need them to tackle Olympus Mons, the tallest planetary mountain in our solar system. It’s two and a half times the size of Everest!', distance: '225 mil. km', ett: '9 months' },
                    { picture: imageEuropa, name: 'Europa', description: 'The smallest of the four Galilean moons orbiting Jupiter, Europa is a winter lover’s dream. With an icy surface, it’s perfect for a bit of ice skating, curling, hockey, or simple relaxation in your snug wintery cabin.', distance: '628 mil. km', ett: '3 years' },
                    { picture: imageTitan, name: 'Titan', description: 'The only moon known to have a dense atmosphere other than Earth, Titan is a home away from home (just a few hundred degrees colder!). As a bonus, you get striking views of the Rings of Saturn.', distance: '1.6 bil. km', ett: '7 years' },
                ],
            };
        },
        created() {
            this.selectedDestination = this.destinations[0];
        },
        methods: {
            selectMember(index) {
                this.selectedDestination = this.destinations[index];
                this.selectedDestination = index;
            },
        },
    };
</script>

<style src="@/assets/styles/helpers.css"></style>
<style src="@/assets/styles/reset.css"></style>
<style src="@/assets/styles/style.css"></style>