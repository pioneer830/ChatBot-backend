<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlansRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules['name'] = ['required', 'string'];
        $rules['plan_description'] = ['required', 'string'];
        $rules['amount'] = ['required', 'numeric'];
        $rules['plan_interval'] = ['required', 'string'];
        $rules['plan_intervalCount'] = ['required', 'numeric'];
        $rules['trial_period_days'] = ['nullable', 'string'];

        return $rules;
    }

    public function attributes()
    {
        $attributes = parent::attributes();
        $attributes['name'] = 'Plan Name';
        $attributes['plan_description'] = 'Plan Description';
        $attributes['amount'] = 'Amount';
        $attributes['plan_interval'] = 'Plan Interval';
        $attributes['plan_intervalCount'] = 'Plan Interval Count';
        $attributes['trial_period_days'] = 'Trial Period Days';

        return $attributes;
    }
}
