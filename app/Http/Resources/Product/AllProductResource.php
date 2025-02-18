<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;


class AllProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        $imageOrVideo = $this->images->whereIn('type', [0, 1])->sortBy('type')->first();



        return [
            'productId' => $this->id,
            'name' => $this->name,
            'isActive' => $this->is_active,
            'media' => $imageOrVideo
    ? Storage::disk('public')->url($imageOrVideo->path)
    : "",
            'type' => $imageOrVideo ? $imageOrVideo->type : ""
        ];
    }
}
