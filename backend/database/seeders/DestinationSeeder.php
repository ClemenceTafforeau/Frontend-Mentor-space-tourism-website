<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destination::factory()->create([
            'picture_webp' => 'image-moon.webp',
            'picture_png' => 'image-moon.png',
            'name' => 'Moon',
            'description' => 'See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.',
            'distance' => 384400,
            'ett' => 3
        ]);

        Destination::factory()->create([
            'picture_webp' => 'image-mars.webp',
            'picture_png' => 'image-mars.png',
            'name' => 'Mars',
            'description' => 'Don’t forget to pack your hiking boots. You’ll need them to tackle Olympus Mons, the tallest planetary mountain in our solar system. It’s two and a half times the size of Everest!.',
            'distance' => 225000000,
            'ett' => 274
        ]);

        Destination::factory()->create([
            'picture_webp' => 'image-europa.webp',
            'picture_png' => 'image-europa.png',
            'name' => 'Europa',
            'description' => 'The smallest of the four Galilean moons orbiting Jupiter, Europa is a winter lover’s dream. With an icy surface, it’s perfect for a bit of ice skating, curling, hockey, or simple relaxation in your snug wintery cabin.',
            'distance' => 628000000,
            'ett' => 1095
        ]);

        Destination::factory()->create([
            'picture_webp' => 'image-titan.webp',
            'picture_png' => 'image-titan.png',
            'name' => 'Titan',
            'description' => 'The only moon known to have a dense atmosphere other than Earth, Titan is a home away from home (just a few hundred degrees colder!). As a bonus, you get striking views of the Rings of Saturn.',
            'distance' => 16000000000,
            'ett' => 2555
        ]);
    }
}
