<?php

namespace App\Http\Requests\Feedback;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateFeedbackRequest extends FormRequest
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
            "feedbackId"=>'required|exists:feedbacks,id',
            "Name"=>'string|required',
            "Feedback"=>'string|required',
            "Rating"=>'integer|between:1,5'
        ];
    }
    public function failedValidation(Validator $validator )
    {
       throw new HttpResponseException(Response()->json([
          "message"=>$validator->errors()
       ],401));
    }
}
