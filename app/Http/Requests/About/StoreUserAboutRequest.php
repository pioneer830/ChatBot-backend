<?php

namespace App\Http\Requests\About;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserAboutRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description'=> ['required'],
            'industry_id' => ['required', Rule::exists('industries', 'id')],
             'user_id' => ['required', Rule::exists('users', 'id')]
        ];
    }
}
