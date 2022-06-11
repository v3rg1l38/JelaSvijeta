<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $createdAtTimestamp = strtotime($this->created_at);
        $updatedAtTimestamp = strtotime($this->updated_at);

        $status = 'created';

        if($diff_time = $request->get('diff_time'))
        {
            $diffTimestamp = strtotime($diff_time);

            if($createdAtTimestamp > $diffTimestamp)
            {
                $status = 'created';
            }
            else if($updatedAtTimestamp > $diffTimestamp)
            {
                $status = 'modified';
            }
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $status,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'ingredients' => IngredientResource::collection($this->whenLoaded('ingredients'))
        ];
    }
}
