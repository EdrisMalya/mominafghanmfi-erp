<?php

namespace App\Http\Requests\Configurations\SystemConfigurations;

use App\Rules\CheckMainBranchRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BranchRequest extends FormRequest
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
            'name' => ['required', 'string', Rule::unique('branches')->ignore($this->branch)],
            'location' => ['required', 'string', 'min:1', 'max:250'],
            'phone_number' => ['required', 'string', 'min:1', 'max:20'],
            'email' => ['required', 'string', 'email'],
            'branch_manager_id' => ['required', 'int'],
            'is_main' => ['required', 'boolean', new CheckMainBranchRule],
            'status' => ['required', 'boolean'],
            'province_id' => ['required', 'int'],
        ];
    }

    public function validatedData()
    {
        $data = $this->validated();
        $data['created_by'] = auth()->id();
        return $data;
    }
}
