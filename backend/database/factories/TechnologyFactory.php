<?php

namespace Database\Factories;

use App\Enums\TechnologyEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Technology>
 */
class TechnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'picture_portrait' => $this->faker->imageUrl(),
            'picture_landscape' => $this->faker->imageUrl(),
            'name' => fake()->randomElement(TechnologyEnum::cases())->value,
            'description' => $this->faker->text(),
        ];
    }
}
