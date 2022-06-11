<?php

namespace App\Repositories;

use App\Http\Filters\MealFilter;
use App\Http\Resources\MealCollection;
use App\Interfaces\MealRepositoryInterface;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealRepository implements MealRepositoryInterface
{
    public function getFilteredMeals(MealFilter $filter, Request $request)
    {
        $request->validate([
            'lang' => 'required'
        ]);

        $meals = Meal::filter($filter)->paginate($request->get('per_page'));

        return new MealCollection($meals);
    }
}
