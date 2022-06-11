<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Language;
use App\Models\Meal;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Language::factory()->create(['locale' => 'hr']);
        Language::factory()->create(['locale' => 'en']);
        Language::factory()->create(['locale' => 'fr']);

        Tag::factory(150)->create();

        Meal::factory(40)
            ->has(Tag::factory()->count(rand(1, 5)))
            ->has(Ingredient::factory()->count(rand(1, 6)))
            ->create();
    }
}
