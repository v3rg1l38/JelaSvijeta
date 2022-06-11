<?php

namespace App\Interfaces;

use App\Http\Filters\MealFilter;
use Illuminate\Http\Request;

interface MealRepositoryInterface
{
    public function getFilteredMeals(MealFilter $filter, Request $request);
}
