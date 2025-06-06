<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateCustomerRequest extends FormRequest
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
            'name' =>['required'],
            'email' =>['nullable', 'email', 'unique:customers,email'],
            'address' => 'nullable',
            'phone' =>'nullable',
            'description' => 'nullable',
        ];
    }
    public function failedValidation(Validator $validator)
    {
      throw new HttpResponseException(response()->json([
        'message' => $validator->errors()
      ],401));
    }
}
