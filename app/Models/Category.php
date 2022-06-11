<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Meal;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Category extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $timestamps = false;
    public $translatedAttributes = ['title'];

    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }
}
