<?php

namespace Database\Factories;

use App\Enums\RankEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CrewMember>
 */
class CrewMemberFactory extends Factory
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
            'rank' => fake()->randomElement(RankEnum::cases())->value,
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'biography' => $this->faker->text(),
        ];
    }
}
