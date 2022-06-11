<?php

namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class MealFilter extends Filter
{
    /**
     * Filter the products by the given category.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function category(string $value = null): Builder
    {
        switch($value)
        {
            case 'NULL':
                return $this->builder->whereNull('category_id');
            case '!NULL':
                return $this->builder->whereNotNull('category_id');
            default:
                return $this->builder->where('category_id', $value);
        }
    }

    /**
     * Filter the products by the given category.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function tags(string $value = null): Builder
    {
        return $this->builder->whereHas('tags', function($query) use ($value) {
            $splitedTagIDs = explode(',', $value);

            $query->whereIn('tag_id', $splitedTagIDs);
        });
    }

    /**
     * Filter the products by the given category.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function lang(string $value = null): Builder
    {
        app()->setLocale($value);

        return $this->builder;
    }

    /**
     * Filter the products by the given category.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function diff_time(string $value = null): Builder
    {
        $convertedTimestampToDate = date('Y-m-d H:i:s', $value);

        return $this->builder->where('created_at', '>=', $convertedTimestampToDate)
            ->where('updated_at', '>=', $convertedTimestampToDate);
    }

    /**
     * Filter the products by the given category.
     *
     * @param  string|null  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function with(string $value = null): Builder
    {
        $splitedWithParamter = explode(',', $value);
        $validatedRelationships = [];

        foreach($splitedWithParamter as $relationship)
        {
            if(!empty($relationship) && !is_null($this->builder->getModel()->$relationship()))
            {
                $validatedRelationships[] = $relationship;
            }
        }

        return $this->builder->with($validatedRelationships);
    }
}
