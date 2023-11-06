<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class ImageRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'image'=>'required'
        ];
    }

    function failedValidation(Validator $validator): ValidationException
    {
        $errors = (new ValidationException($validator))->errors();
        $errorData = [];
        if (!empty($errors)) {
            foreach ($errors as $key => $err) {
                $message = current($err);
                $errorData[$key] = $message;
            }
        }


        throw new HttpResponseException(response()->json([
            'message' => 'Validation Error',
            'errors' => $errorData
        ], 200));
    }

}
