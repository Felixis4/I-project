<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->propertyable->id,
            'title' => $this->propertyable->title,
            'description' => $this->propertyable->description,
            'price' => $this->propertyable->price,
            'covered_area' => $this->propertyable->covered_area,
            'total_area' => $this->propertyable->total_area,
            'rooms_number' => $this->propertyable->rooms_number,
            'city_id' => $this->city_id,
            'type' => $this->type,
            'light' => $this->light,
            'natural_gas' => $this->natural_gas,
            'phone' => $this->phone,
            'water' => $this->water,
            'sewers' => $this->sewers,
            'internet' => $this->internet,
            'asphalt' => $this->asphalt,
            'images' => $this->images,
        ];
    }
}
