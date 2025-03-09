<?php

namespace App\Http\Requests\CustomerServices;

use App\Rules\CheckAgeForFinancing;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'photo' => [$this->method() == 'GET'? 'required': 'nullable', 'file', 'image', 'max:2000'],
            'nic_copy' => [$this->method() == 'GET'? 'required': 'nullable', 'file', 'max:2000'],
            'first_name' => ['required', 'string', 'min:1', 'max:255'],
            'last_name' => ['required', 'string', 'min:1', 'max:255'],
            'father_name' => ['required', 'string', 'min:1', 'max:255'],
            'nic_number' => ['required', 'string', 'min:1', 'max:255', Rule::unique('customers')->ignore($this->customer)],
            'district' => ['required', 'string', 'min:1', 'max:255'],
            'village' => ['required', 'string', 'min:1', 'max:255'],
            'province_id' => ['int', 'required'],
            'dob' => ['string', 'date', 'required', new CheckAgeForFinancing],
            'status' => ['sometimes', Rule::requiredIf(fn()=>$this->method()=='PUT'), Rule::in(['active', 'inactive', 'block'])],
        ];
    }

    public function validatedData()
    {
        $data = $this->validated();
        $data['created_by'] = auth()->id();
        $data['status'] = $this->method() == 'GET' ? 'active' : ($data['status'] ?? 'active');
        unset($data['photo']);
        unset($data['nic_copy']);
        return $data;

    }
}
