<?php

namespace App\Http\Requests\CharacterLength;

use App\Enums\UserTypeEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property mixed $tone_id
 * @property mixed $user_id
 */
class DeleteCharacterLengthRequest extends FormRequest
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
            'type' => ['required', Rule::in(UserTypeEnum::TYPE)],
            'user_id' => ['required_if:type,app', Rule::exists('users', 'id')],
            'client_id' => ['required_if:type,ext', Rule::exists('guests', 'client_id')],
            'id' => ['required', Rule::exists('user_character_lengths', 'id')],
        ];
    }
}
