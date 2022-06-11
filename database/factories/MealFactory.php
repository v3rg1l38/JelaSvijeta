<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $languages = Language::all()->toArray();
        $locales = [];

        foreach($languages as $language) {
            $locales[] = $language['locale'];
        }

        $definition = [];
        $definition['category_id'] = (rand(0, 1) != 0) ? Category::factory()->create()->id : null;

        foreach($locales as $locale) {
            $definition[$locale]['title'] = $this->faker->unique()->text(15);
            $definition[$locale]['description'] = $this->faker->sentence(2);
        }

        return $definition;
    }
}
