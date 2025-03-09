<?php

namespace App\Http\Controllers\FinanceMode;

use App\Http\Controllers\Controller;
use App\Http\Resources\FinancingMode\Murabeha\MurabehaStepResource;
use App\Models\Customer;
use App\Models\CustomerDetails;
use App\Models\MurabehaRequest;
use Illuminate\Http\Request;

class MurabehaController extends Controller
{
    public function processStep(Request $request, $step, $request_id = null)
    {
        $this->allowed('murabeha-add-new-request');
        switch ($step){
            case '1':
                $user = auth()->user();
                $province_id = $user->profile->province_id;
                $branch_id = $user->profile->branch_id;
                $customer_id = request()->validate(['customer_id' => ['required', 'int', function ($attribute, $value, $fail)  {
                    if($value == 0) $fail('Please select customer');
                }]])['customer_id'];
                Customer::query()->find($customer_id);
                if(
                    MurabehaRequest::query()->where([
                        ['customer_id', '=', $customer_id],
                    ])->whereIn('status', [
                        'personal_information_creation',
                    ])->exists()
                ) return ['result' => false, 'message' => 'This customer has a request which is not final yet'];
                $murabeha_request = MurabehaRequest::query()->create(
                    [
                        'customer_id' => $customer_id,
                        'province_id' => $province_id,
                        'branch_id' => $branch_id,
                        'created_by' => $user->id
                    ],
                );
                return ['result' => true, 'message' => 'Customer step 1 request saved successfully', 'request_id' => $murabeha_request->id];
            case '2':
                $murabeha_request = MurabehaRequest::query()->findOrFail($request_id);
                $rules = [
                    'age' => 'required|int',
                    'phone_number' => 'required|string',
                    'second_phone_number' => 'nullable|string',
                    'current_job' => 'required|string',
                    'personally_monthly_income' => 'required|numeric|min:1',
                    'family_monthly_income' => 'required|numeric|min:1',
                    'other_income' => 'required|numeric|min:0',
                    'province_id' => 'required|int',
                    'district' => 'required|string',
                    'village' => 'required|string',
                    'nature_of_residence' => 'required|string|in:Owner,Rental,Mortgaged',
                ];
                $data = $request->validate($rules);
                $data['customer_id'] = $murabeha_request->customer_id;
                $data['financing_mode'] = 'murabeha';
                $data['financing_mode_request_id'] = $murabeha_request->id;
                CustomerDetails::query()->updateOrCreate(
                    [
                        'customer_id' => $murabeha_request->customer_id,
                        'financing_mode' => 'murabeha',
                        'financing_mode_request_id' => $murabeha_request->id,
                    ],
                    $data
                );
                return ['result' => true, 'message' => 'Customer step 2 request saved successfully'];

        }
    }

    public function getStepRequest(MurabehaRequest $request)
    {
        return new MurabehaStepResource($request->load(['customer', 'customer_details']));
    }
}
