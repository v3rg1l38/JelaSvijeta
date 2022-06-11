<?php

namespace App\Http\Controllers;

use App\Http\Filters\MealFilter;
use App\Interfaces\MealRepositoryInterface;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function __invoke(MealRepositoryInterface $mealRepository, MealFilter $filter, Request $request)
    {
        return $mealRepository->getFilteredMeals($filter, $request);
    }
}
