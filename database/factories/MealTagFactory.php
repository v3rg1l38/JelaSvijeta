<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MealTag>
 */
class MealTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'meal_id' => $this->faker->numberBetween(1, 40),
            'tag_id' => $this->faker->unique()->numberBetween(1, 40)
        ];
    }
}
