<?php

namespace App\Http\Requests\Configurations\SystemConfigurations;

use Illuminate\Foundation\Http\FormRequest;

class SystemConfigurationsRequest extends FormRequest
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
            'minimum_age_for_financing' => ['required', 'integer', 'min:1', 'max:120'],
        ];
    }


}
