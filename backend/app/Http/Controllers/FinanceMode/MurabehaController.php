<?php

namespace App\Http\Controllers\FinanceMode;

use App\Helpers\DatatableBuilder;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\FinancingMode\Murabeha\MurabehaCustomerAssetRequest;
use App\Http\Requests\FinancingMode\Murabeha\MurabehaCustomerOldBorrowingRequest;
use App\Http\Requests\FinancingMode\Murabeha\MurabehaCustomerRequiredItemRequest;
use App\Http\Requests\UserProfileRequest;
use App\Http\Resources\FinancingMode\Murabeha\MurabehaCustomerAssetResource;
use App\Http\Resources\FinancingMode\Murabeha\MurabehaCustomerOldBorrowingResource;
use App\Http\Resources\FinancingMode\Murabeha\MurabehaCustomerRequiredItemResource;
use App\Http\Resources\FinancingMode\Murabeha\MurabehaResource;
use App\Http\Resources\FinancingMode\Murabeha\MurabehaStepResource;
use App\Models\Customer;
use App\Models\CustomerAsset;
use App\Models\CustomerDetails;
use App\Models\CustomerOldBorrowing;
use App\Models\CustomerRequiredItem;
use App\Models\MurabehaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MurabehaController extends Controller
{
    public function index()
    {
        $this->allowed('murabeha-access');
        $user = auth()->user();
        $province_id = $user->profile->province_id;
        $branch_id = $user->profile->branch_id;

        $query = MurabehaRequest::query()->with([
            'customer',
            'created_by_user',
        ])->where([
            ['province_id', '=', $province_id],
            ['branch_id', '=', $branch_id],
        ]);

        $datatable = new DatatableBuilder($query, ['id']);
        return MurabehaResource::collection($datatable->build());

    }
    public function processStep(Request $request, $step, $request_id = null)
    {
        $this->allowed('murabeha-add-new-request');
        if($request_id != null){
            $murabeha_request = MurabehaRequest::query()->findOrFail($request_id);
        }else{
            $murabeha_request = null;
        }
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
                $murabeha_request->update(['step_2_completed' => true]);
                return ['result' => true, 'message' => 'Customer step 2 request saved successfully'];
            case '3':
                switch ($request->method()){
                    case 'POST':
                        $validator = Validator::make($request->all(), (new MurabehaCustomerAssetRequest())->rules());
                        if ($validator->fails()) {
                            return response()->json(['errors' => $validator->errors()], 422);
                        }
                        $data = $validator->validated();
                        $data['created_by'] = auth()->id();
                        $data['relation'] = 'murabeha';
                        $data['relation_id'] = $request_id;
                        $data['legal_document_file_id'] = Helpers::uploadFile($request->file('legal_document'), $murabeha_request->customer_id, 'customer_files', 'murabeha/'.$request_id.'/customer_assets_document')->id;
                        unset($data['legal_document']);
                        CustomerAsset::query()->create($data);
                        $murabeha_request->update(['step_3_completed' => true]);
                        return ['result' => true, 'message' => 'Asset saved successfully'];
                    case 'PUT':
                        $validator = Validator::make($request->all(), (new MurabehaCustomerAssetRequest())->rules());
                        if ($validator->fails()) {
                            return response()->json(['errors' => $validator->errors()], 422);
                        }
                        $asset_id = $request->get('asset_id');
                        $asset = CustomerAsset::query()->findOrFail($asset_id);
                        $data =  $validator->validated();
                        $data['legal_document_file_id'] = Helpers::uploadFile($request->file('legal_document'), $murabeha_request->customer_id, 'customer_files', 'murabeha/'.$request_id.'/customer_assets_document', true, $asset->legal_document_file_id)->id??$asset->legal_document_file_id;
                        unset($data['legal_document']);
                        $asset->update($data);
                        return ['result' => true, 'message' => 'Updated successfully'];
                    case 'DELETE':
                        $asset_id = $request->get('asset_id');
                        $asset = CustomerAsset::query()->findOrFail($asset_id);
                        $asset->delete();
                        Helpers::deleteFile($asset->legal_document_file_id);
                        return ['result' => true, 'message' => 'Asset deleted successfully'];
                    case 'GET':
                        $asset_id = $request->get('asset_id');
                        $asset = CustomerAsset::query()->with(['asset_type', 'legal_document'])->findOrFail($asset_id);
                        return new MurabehaCustomerAssetResource($asset);
                }

                return ['result' => true, 'message' => 'Customer step 3 request saved successfully'];
            case '4':
                if ($request->has('skip_customer_borrowing_information') && $request->method() == 'PUT'){
                    $murabeha_request->update(['step_4_completed' => true]);
                    return ['result' => true, 'message' => 'Customer step 4 skipped successfully'];
                }else{
                    switch ($request->method()){
                        case 'POST':
                            $validator = Validator::make($request->all(), (new MurabehaCustomerOldBorrowingRequest())->rules());
                            if ($validator->fails()) {
                                return response()->json(['errors' => $validator->errors()], 422);
                            }
                            $data =  $validator->validated();
                            $data['created_by'] = auth()->id();
                            $data['relation'] = 'murabeha';
                            $data['relation_id'] = $murabeha_request->id;
                            CustomerOldBorrowing::query()->create($data);
                            $murabeha_request->update(['step_4_completed' => true]);
                            return ['result' => true, 'message' => 'Customer borrowing information saved successfully'];
                        case 'PUT':
                            $borrowing_id = $request->get('borrowing_id');
                            $borrowing = CustomerOldBorrowing::query()->findOrFail($borrowing_id);
                            $validator = Validator::make($request->all(), (new MurabehaCustomerOldBorrowingRequest())->rules());
                            if ($validator->fails()) {
                                return response()->json(['errors' => $validator->errors()], 422);
                            }
                            $borrowing->update($validator->validated());
                            return ['result' => true, 'message' => 'Customer borrowing information updated successfully'];
                        case 'GET':
                            $borrowing_id = $request->get('borrowing_id');
                            $borrowing = CustomerOldBorrowing::query()->findOrFail($borrowing_id);
                            return new MurabehaCustomerOldBorrowingResource($borrowing);
                        case 'DELETE':
                            $borrowing_id = $request->get('borrowing_id');
                            $borrowing = CustomerOldBorrowing::query()->findOrFail($borrowing_id);
                            $borrowing->delete();
                            if($murabeha_request->customer_old_borrowings->count() < 1){
                                $murabeha_request->update(['step_4_completed' => false]);
                            }
                            return ['result' => true, 'message' => 'Delete successfully'];
                    }
                }

            case '5':
                switch ($request->method()){
                    case 'POST':
                        $validator = Validator::make($request->all(), (new MurabehaCustomerRequiredItemRequest())->rules());
                        if ($validator->fails()) {
                            return response()->json(['errors' => $validator->errors()], 422);
                        }
                        $data = $validator->validated();
                        $data['created_by'] = auth()->id();
                        $data['relation'] = 'murabeha';
                        $data['relation_id'] = $murabeha_request->id;
                        $data['supplier_document_id'] = Helpers::uploadFile($request->file('supplier_document'), $murabeha_request->customer_id, 'customer_files', 'murabeha/'.$request_id.'/customer_supplier_document')?->id??null;
                        $data['total_price'] = $data['price_per_item'] * $data['quantity'];
                        unset($data['supplier_document']);
                        CustomerRequiredItem::query()->create($data);
                        $murabeha_request->update(['step_5_completed' => true]);
                        return ['result' => true, 'message' => 'Saved successfully'];
                    case 'GET':
                        $item = CustomerRequiredItem::query()->findOrFail($request->get('item_id'));
                        return new MurabehaCustomerRequiredItemResource($item);
                    case 'PUT':
                        $item = CustomerRequiredItem::query()->findOrFail($request->get('item_id'));
                        $validator = Validator::make($request->all(), (new MurabehaCustomerRequiredItemRequest())->rules());
                        if ($validator->fails()) {
                            return response()->json(['errors' => $validator->errors()], 422);
                        }
                        $data = $validator->validated();
                        $data['supplier_document_id'] = Helpers::uploadFile($request->file('supplier_document'), $murabeha_request->customer_id, 'customer_files', 'murabeha/'.$request_id.'/customer_supplier_document', true, $item->supplier_document_id)?->id??$item->supplier_document_id;
                        unset($data['supplier_document']);
                        $data['total_price'] = $data['price_per_item'] * $data['quantity'];
                        $item->update($data);
                        return ['result' => true, 'message' => 'Updated successfully'];
                    case 'DELETE':
                        $item_ids = explode(',', $request->get('item_ids'));
                        $items = CustomerRequiredItem::query()->whereIn('id', $item_ids)->get();
                        foreach ($items as $item) {
                            Helpers::deleteFile($item->supplier_document_id);
                            $item->delete();
                        }
                        if($murabeha_request->customer_requested_items->count() < 1){
                            $murabeha_request->update(['step_5_completed' => false]);
                        }
                        return ['result' => true, 'message' => 'Deleted successfully'];

                }
        }
    }

    public function getStepRequest(MurabehaRequest $request)
    {
        return new MurabehaStepResource($request->load(
            [
                'customer',
                'customer_details',
                'customer_assets.asset_type',
                'customer_assets.legal_document',
                'customer_old_borrowings',
                'customer_requested_items.supplier_document',
            ]
        ));
    }
}
