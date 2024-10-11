<template>
    <h1 class="h1-secondary">
        <span aria-hidden="true">03</span>
        <span>Space launch 101</span>
    </h1>
    <transition name="fade" mode="out-in">
        <picture class="technology-img" :key="selectedTechnology.name">
            <source media="(min-width:1280px)" :srcset="selectedTechnology.picturePortrait">
            <img  
                :src="selectedTechnology.pictureLandscape" 
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
</template>

<script>
    import imageLaunchVehicleLandscape from '@/assets/img/image-launch-vehicle-landscape.jpg';
    import imageLaunchVehiclePortrait from '@/assets/img/image-launch-vehicle-portrait.jpg';
    import imageSpaceportLandscape from '@/assets/img/image-spaceport-landscape.jpg';
    import imageSpaceportPortrait from '@/assets/img/image-spaceport-portrait.jpg';
    import imageSpaceCapsuleLandscape from '@/assets/img/image-space-capsule-landscape.jpg';
    import imageSpaceCapsulePortrait from '@/assets/img/image-space-capsule-portrait.jpg';

    export default {
        data() {
            return {
                selectedTechnology: {},
                selectedTechnologyIndex: 0,
                technologies: [
                    { pictureLandscape: imageLaunchVehicleLandscape, picturePortrait: imageLaunchVehiclePortrait, name: 'Launch vehicle', description: 'A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth\'s surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it\'s quite an awe-inspiring sight on the launch pad!' },
                    { pictureLandscape: imageSpaceportLandscape, picturePortrait: imageSpaceportPortrait, name: 'Spaceport', description: 'A spaceport or cosmodrome is a site for launching (or receiving) spacecraft, by analogy to the seaport for ships or airport for aircraft. Based in the famous Cape Canaveral, our spaceport is ideally situated to take advantage of the Earth’s rotation for launch.' },
                    { pictureLandscape: imageSpaceCapsuleLandscape, picturePortrait: imageSpaceCapsulePortrait, name: 'Space capsule', description: 'A space capsule is an often-crewed spacecraft that uses a blunt-body reentry capsule to reenter the Earth\'s atmosphere without wings. Our capsule is where you\'ll spend your time during the flight. It includes a space gym, cinema, and plenty of other activities to keep you entertained.' },
                ],
            };
        },
        created() {
            this.selectedTechnology = this.technologies[0];
        },
        methods: {
            selectTechnology(index) {
                this.selectedTechnology = this.technologies[index];
                this.selectedTechnologyIndex = index;
            },
        },
    };
</script>