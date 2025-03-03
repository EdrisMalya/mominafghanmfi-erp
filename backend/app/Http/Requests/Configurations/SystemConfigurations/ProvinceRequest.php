<?php

namespace App\Http\Requests\Configurations\SystemConfigurations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProvinceRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:1', 'max:100', Rule::unique('provinces')->ignore($this->branch_province)],
        ];
    }

    public function validatedData()
    {
        $data = $this->validated();
        $data['created_by'] = auth()->id();
        return $data;
    }
}
