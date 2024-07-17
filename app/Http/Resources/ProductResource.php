<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $description = str_replace('/storage/', url('storage/') . '/', $this->description);
        return [
            'id' => $this->id,
            'category' => $this->category,
            'name' => $this->name,
            'image' => url('storage/' . $this->image),
            'short_content' => $this->short_content,
            'description' => $description,
            'created_at' => $this->created_at
        ];
    }
}
