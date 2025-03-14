<?php

namespace App\Http\Requests\FinancingMode\Murabeha;

use Illuminate\Foundation\Http\FormRequest;

class MurabehaCustomerRequiredItemRequest extends FormRequest
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
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price_per_item' => 'required|numeric|min:0',
            'quality' => 'required|in:High,Medium,Low',
            'has_supplier' => 'required|in:Yes,No',
            'supplier_name' => 'nullable|required_if:has_supplier,Yes|string|max:255',
            'supplier_address' => 'nullable|required_if:has_supplier,Yes|string|max:500',
            'supplier_contact_number' => 'nullable|required_if:has_supplier,Yes|string|max:20',
            'supplier_email' => 'nullable|required_if:has_supplier,Yes|email|max:255',
            'supplier_document' => 'nullable|file|mimes:pdf,jpeg,jpg,png,gif',
        ];
    }

}
