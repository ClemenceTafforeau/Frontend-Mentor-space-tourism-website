<?php

namespace Database\Factories;

use App\Enums\DestinationEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'picture_webp' => $this->faker->imageUrl(),
            'picture_png' => $this->faker->imageUrl(),
            'name' => fake()->randomElement(DestinationEnum::cases())->value,
            'description' => $this->faker->text(),
            'distance' => $this->faker->numberBetween(1000, 100000),
            'ett' => $this->faker->numberBetween(1, 100000),
        ];
    }
}
