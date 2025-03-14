<?php

namespace App\Http\Requests\FinancingMode\Murabeha;

use Illuminate\Foundation\Http\FormRequest;

class MurabehaCustomerOldBorrowingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'loan_reference' => ['required', 'string', 'min:1'],
            'name_of_the_lender' => ['required', 'string', 'min:1'],
            'address_of_the_lender' => ['required', 'string', 'min:1'],
            'for_how_long' => ['required', 'string', 'min:1'],
        ];
    }

}
