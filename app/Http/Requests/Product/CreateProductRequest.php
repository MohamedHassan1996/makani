<?php

namespace App\Http\Requests\Product;

use App\Enums\Product\ProductStatus;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nameEn' => ['required', 'unique:product_translations,name,NULL,id,locale,en'],
            'nameAr' => ['required', 'unique:product_translations,name,NULL,id,locale,ar'],
            'slugEn' => ['required','unique:product_translations,slug,NULL,id,locale,en'],
            'slugAr' => ['required','unique:product_translations,slug,NULL,id,locale,ar'],
            'descriptionEn' => ['required'],
            'descriptionAr' => ['required'],
            'productCategoryId'=>['nullable','exists:product_categories,id'],
            'contentEn' => ['required'],
            'contentAr' => ['required'],
            'metaDataEn' => ['required'],
            'metaDataAr' => ['required'],
            'isActive' => ['required', new Enum(ProductStatus::class)],
            'images' => ['required','max:2048'],
            'type' => ['required']
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()
        ], 401));
    }
}
