<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'job_title' => ['required', 'string', 'max:255'],
            'employee_id' => ['required', 'integer'],
            'phone_number' => ['required', 'string', 'regex:/^\(\d{3}\) \d{3} - \d{4}$/'],
            'dob' => ['required', 'date'],
            'current_address' => ['required', 'string', 'max:255'],
            'permanent_address' => ['required', 'string', 'max:255'],
            'joining_date' => ['required', 'date'],
            'nic_number' => ['required', 'string', 'max:255'],
            'alternative_phone_number' => ['required', 'string', 'regex:/^\(\d{3}\) \d{3} - \d{4}$/'],
            'a_p_n_relationship' => ['required', 'string', 'max:255'],
            'province_id' => ['required', 'integer', 'exists:provinces,id'],
            'branch_id' => ['required', 'integer', 'exists:branches,id'],
        ];
    }

    /**
     * Get custom error messages for validation.
     */
    public function messages(): array
    {
        return [
            'a_p_n_relationship.required' => 'Alternative phone number relationship is required.',
            'phone_number.regex' => 'Phone number format must be (###) ### - ####.',
            'alternative_phone_number.regex' => 'Alternative phone number format must be (###) ### - ####.',
            'province_id.exists' => 'Selected province does not exist.',
            'branch_id.exists' => 'Selected branch does not exist.',
        ];
    }
}
