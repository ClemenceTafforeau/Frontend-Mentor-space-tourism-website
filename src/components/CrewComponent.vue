<template>
    <h1 class="h1-secondary">
        <span aria-hidden="true">02</span>
        <span>Meet your crew</span>
    </h1>
    <transition name="fade" mode="out-in">
        <div class="crew-img" :key="selectedCrewMember.name">
            <img  
                :src="selectedCrewMember.picture" 
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
        <section class="crew-section" :key="selectedCrewMember.name">
            <div class="crew-choice">
                <h2><span>{{ selectedCrewMember.rank }}</span><span>{{ selectedCrewMember.name }}</span></h2>    
                <p>{{ selectedCrewMember.biography }}</p>
            </div>
        </section>
    </transition>
</template>

<script>
    import imageDouglasHurley from '@/assets/img/image-douglas-hurley.webp';
    import imageMarkShuttleworth from '@/assets/img/image-mark-shuttleworth.webp';
    import imageVictorGlover from '@/assets/img/image-victor-glover.webp';
    import imageAnoushehAnsari from '@/assets/img/image-anousheh-ansari.webp';

    export default {
        data() {
            return {
                selectedCrewMember: {}, // Stores the currently selected crew member
                selectedCrewIndex: 0,   // Default to the first crew member (index 0)
                crewMembers: [
                    { picture: imageDouglasHurley, rank: 'Commander', name: 'Douglas Hurley', biography: 'Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.' },
                    { picture: imageMarkShuttleworth, rank: 'Mission specialist', name: 'Mark Shuttleworth', biography: 'Mark Richard Shuttleworth is the founder and CEO of Canonical, the company behind the Linux-based Ubuntu operating system. Shuttleworth became the first South African to travel to space as a space tourist.' },
                    { picture: imageVictorGlover, rank: 'Pilot', name: 'Victor Glover', biography: 'Pilot on the first operational flight of the SpaceX Crew Dragon to the International Space Station. Glover is a commander in the U.S. Navy where he pilots an F/A-18.He was a crew member of Expedition 64, and served as a station systems flight engineer.' },
                    { picture: imageAnoushehAnsari, rank: 'Flight engineer', name: 'Anousheh Ansari', biography: 'Anousheh Ansari is an Iranian American engineer and co-founder of Prodea Systems. Ansari was the fourth self-funded space tourist, the first self-funded woman to fly to the ISS, and the first Iranian in space. ' },
                ],
            };
        },
        created() {
            this.selectedCrewMember = this.crewMembers[0];
        },
        methods: {
            selectMember(index) {
                this.selectedCrewMember = this.crewMembers[index];
                this.selectedCrewIndex = index;
            },
        },
    };
</script>

<style src="@/assets/styles/helpers.css"></style>
<style src="@/assets/styles/reset.css"></style>
<style src="@/assets/styles/style.css"></style>