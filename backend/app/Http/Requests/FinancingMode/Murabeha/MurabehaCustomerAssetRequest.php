<?php

namespace App\Http\Requests\FinancingMode\Murabeha;

use App\Helpers\Helpers;
use App\Models\CustomerAsset;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MurabehaCustomerAssetRequest extends FormRequest
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
            'asset' => ['required', 'string', 'min:1', function ($attribute, $value, $fail) {
                if(
                    CustomerAsset::query()
                        ->where('relation_id',$this->request_id)
                        ->where('relation', 'murabeha')
                        ->where('asset', $value)
                    ->exists()
                ) $fail('This asset already exists');
            }],
            'asset_type_id' => ['required', 'numeric', 'min:1'],
            'legal_document' => [Rule::requiredIf(fn() => $this->method() === 'POST'), 'nullable', 'file', 'max:5000'],
            'value' => ['required', 'numeric', 'min:1'],
        ];
    }
}
