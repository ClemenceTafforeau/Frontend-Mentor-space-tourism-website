<template>
    <h1 class="h1-secondary">
        <span aria-hidden="true">01</span>
        <span>Pick your destination</span>
    </h1>
    <transition name="fade" mode="out-in">
        <div class="destination-img" :key="selectedDestination.name">
            <img  
                :src="selectedDestination.picture" 
                :alt="selectedDestination.name" 
            />
        </div>
    </transition>
    <ul class="destination_list">
        <li class="destination_item" v-for="(destination, index) in destinations" :key="index" @click="selectDestination(index)" :class="{ 'destination-active': selectedDestinationIndex === index }">
            <button class="destination_link">{{ destination.name }}</button>
        </li>
        <li class="destination-underline" tabindex="-1" aria-hidden="true"></li>
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
                        <p :key="selectedDestination.name">{{ selectedDestination.distance }}</p>
                    </transition>
                </div>
                <div class="destination-info">
                    <h3>Est. travel time</h3>
                    <transition name="fade" mode="out-in">
                        <p :key="selectedDestination.name">{{ selectedDestination.ett }}</p>
                    </transition>
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
                selectedDestination: {},
                selectedDestinationIndex: 0,
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
        mounted() {
            this.initializeDestinationEventListeners();
            this.moveDestinationUnderlineOnLoad();
        },
        beforeDestroy() {
            this.cleanupDestinationEventListeners();
        },
        methods: {
            initializeDestinationEventListeners() {
                const destinationLinks = document.querySelectorAll('.destination_item');
                const destinationUnderline = document.querySelector('.destination-underline');

                // Ensure underline moves to the element with .destination-active on load
                window.addEventListener('DOMContentLoaded', () => {
                    let activeDestinationLink = document.querySelector('.destination-active');
                    
                    // Move underline to the active element
                    if (activeDestinationLink) {
                        this.moveDestinationUnderline(activeDestinationLink, destinationUnderline);
                    }
                });

                destinationLinks.forEach(destinationLink => {
                    destinationLink.addEventListener('mouseover', () => {
                        // Add hover class and move the underline
                        destinationLinks.forEach(link => link.classList.remove('destination-hover')); // Remove hover class from all
                        destinationLink.classList.add('destination-hover'); // Add hover class to the current link
                        this.moveDestinationUnderline(destinationLink, destinationUnderline);
                    });

                    destinationLink.firstElementChild.addEventListener('focus', () => {
                        // Move underline on focus
                        this.moveDestinationUnderline(destinationLink, destinationUnderline);
                    });

                    destinationLink.addEventListener('mouseout', () => {
                        // Remove hover class when mouse leaves
                        destinationLink.classList.remove('destination-hover'); // Remove hover class
                        const activeDestinationLink = document.querySelector('.destination-active');
                        if (activeDestinationLink) {
                            this.moveDestinationUnderline(activeDestinationLink, destinationUnderline);
                        }
                    });

                    destinationLink.firstElementChild.addEventListener('blur', () => {
                        // Remove hover class when mouse leaves
                        destinationLink.classList.remove('destination-hover'); // Remove hover class
                        const activeDestinationLink = document.querySelector('.destination-active');
                        if (activeDestinationLink) {
                            this.moveDestinationUnderline(activeDestinationLink, destinationUnderline);
                        }
                    });

                    destinationLink.addEventListener('click', () => {
                        // Remove active class from all links
                        destinationLinks.forEach(link => {
                            link.classList.remove('destination-active');
                            link.classList.remove('destination-hover'); // Remove hover class if active link is clicked
                        });
                        // Add active class to the clicked link
                        destinationLink.classList.add('destination-active');
                        // Move the underline
                        this.moveDestinationUnderline(destinationLink, destinationUnderline);
                    });
                });
            },
            cleanupDestinationEventListeners() {
                const destinationLinks = document.querySelectorAll('.destination_item');
                window.removeEventListener('DOMContentLoaded', this.moveDestinationUnderline);

                destinationLinks.forEach(destinationLink => {
                    destinationLink.removeEventListener('mouseover', this.moveDestinationUnderline);
                    destinationLink.removeEventListener('focus', this.moveDestinationUnderline);
                    destinationLink.removeEventListener('mouseout', this.moveDestinationUnderline);
                    destinationLink.removeEventListener('click', this.moveDestinationUnderline);
                });
            },
            moveDestinationUnderlineOnLoad() {
                const firstDestinationLink = document.querySelector('.destination_item');
                const destinationUnderline = document.querySelector('.destination-underline');
                if (firstDestinationLink) {
                    this.moveDestinationUnderline(firstDestinationLink, destinationUnderline);
                }
            },
            moveDestinationUnderline(destinationLink, destinationUnderline) {
                const destinationLinkRect = destinationLink.getBoundingClientRect();
                const destinationNavRect = destinationLink.closest('ul').getBoundingClientRect();

                // Move the underline to the selected link
                destinationUnderline.style.width = `${destinationLinkRect.width}px`;
                destinationUnderline.style.left = `${destinationLinkRect.left - destinationNavRect.left}px`;

                // Add .destination-active class to the current link
                destinationLink.classList.add('destination-hover');
            },
            selectDestination(index) {
                this.selectedDestination = this.destinations[index];
                this.selectedDestinationIndex = index;
            },
        },
    };
</script>

<style src="@/assets/styles/helpers.css"></style>
<style src="@/assets/styles/reset.css"></style>
<style src="@/assets/styles/style.css"></style>