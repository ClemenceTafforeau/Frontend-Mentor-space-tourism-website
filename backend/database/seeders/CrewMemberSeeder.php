<?php

namespace Database\Seeders;

use App\Models\CrewMember;
use Illuminate\Database\Seeder;

class CrewMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CrewMember::factory()->create([
            'picture_webp' => 'image-douglas-hurley.webp',
            'picture_png' => 'image-douglas-hurley.png',
            'rank' => 'Commander',
            'first_name' => 'Douglas',
            'last_name' => 'Hurley',
            'biography' => 'Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.',
        ]);

        CrewMember::factory()->create([
            'picture_webp' => 'image-mark-shuttleworth.webp',
            'picture_png' => 'image-mark-shuttleworth.png',
            'rank' => 'Mission specialist',
            'first_name' => 'Mark',
            'last_name' => 'Shuttleworth',
            'biography' => 'Mark Richard Shuttleworth is the founder and CEO of Canonical, the company behind the Linux-based Ubuntu operating system. Shuttleworth became the first South African to travel to space as a space tourist.',
        ]);

        CrewMember::factory()->create([
            'picture_webp' => 'image-victor-glover.webp',
            'picture_png' => 'image-victor-glover.png',
            'rank' => 'Pilot',
            'first_name' => 'Victor',
            'last_name' => 'Glover',
            'biography' => 'Pilot on the first operational flight of the SpaceX Crew Dragon to the International Space Station. Glover is a commander in the U.S. Navy where he pilots an F/A-18.He was a crew member of Expedition 64, and served as a station systems flight engineer.',
        ]);

        CrewMember::factory()->create([
            'picture_webp' => 'image-anousheh-ansari.webp',
            'picture_png' => 'image-anousheh-ansari.png',
            'rank' => 'Flight engineer',
            'first_name' => 'Anousheh',
            'last_name' => 'Ansari',
            'biography' => 'Anousheh Ansari is an Iranian American engineer and co-founder of Prodea Systems. Ansari was the fourth self-funded space tourist, the first self-funded woman to fly to the ISS, and the first Iranian in space.',
        ]);
    }
}
