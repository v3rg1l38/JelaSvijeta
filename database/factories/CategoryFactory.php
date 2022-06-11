<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
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
        $definition['slug'] = $this->faker->word() . '-' . $this->faker->numberBetween(0, 1000);

        foreach($locales as $locale) {
            $definition[$locale]['title'] = $this->faker->unique()->text(15);
        }

        return $definition;
    }
}
