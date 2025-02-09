<?php

namespace App\Http\Resources\Product\ProductCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // Extract translations for different locales
        $translations = $this->translations->mapWithKeys(function ($translation) {
            return [
                'description' . ucfirst($translation->locale) => $translation->description ?? "",
                'name' . ucfirst($translation->locale) => $translation->name ?? "",
            ];
        });

        return [
            'productCategoryId' => $this->id,
            'image'=>$this->image? Storage::disk('public')->url($this->image):"",
            'isActive' => $this->is_active,
            // Translated fields
            'nameEn' => $translations['nameEn'] ?? "",
            'nameAr' => $translations['nameAr'] ?? "",
            'descriptionEn' => $translations['descriptionEn'] ?? "",
            'descriptionAr' => $translations['descriptionAr'] ?? "",
        ];
    }

}
