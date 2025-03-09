<?php

namespace App\Http\Requests\Configurations\SystemConfigurations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FinancingModeRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:1', 'max:255', Rule::unique('financing_modes')->ignore($this->financing_mode)],
            'status' => ['required', 'boolean'],
            'default_mode' => ['required', 'boolean'],
        ];
    }

    public function validatedData()
    {
        $rules = $this->validated();
        $rules['created_by'] = auth()->id();
        return $rules;
    }
}
