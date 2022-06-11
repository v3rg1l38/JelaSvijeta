<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MealCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }

    public function paginationInformation($request, $paginated, $default)
    {
        return [
            'links' => [
                'prev' => $default['links']['prev'],
                'next' => $default['links']['next'],
                'self' => $request->fullUrl()
            ],
            'meta' => [
                'currentPage' => $default['meta']['current_page'],
                'totalItems' => $default['meta']['total'],
                'itemsPerPage' => $default['meta']['per_page'],
                'totalPages' => $default['meta']['last_page'],
            ]
        ];
    }
}
