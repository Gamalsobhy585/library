<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
return [
    'id'=>$this->id,
    'name'=>$this->name,
    'image'=>str_replace('public/','storage/',$this->img),
];  
  }
}
