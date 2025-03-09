<?php

namespace App\Http\Controllers\CustomerServices;

use App\Helpers\DatatableBuilder;
use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerServices\CustomerRequest;
use App\Http\Resources\CustomerServices\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('for-api')){
            $search = $request->get('query');
            $customerQuery = Customer::query();
            if($search != null && !$request->has('customer_id')){
                $customerQuery = $customerQuery->where(function ($query) use ($search){
                    $query->where('first_name', 'like', '%'.$search.'%');
                    $query->orWhere('last_name', 'like', '%'.$search.'%');
                    $query->orWhere('father_name', 'like', '%'.$search.'%');
                    $query->orWhere('nic_number', 'like', '%'.$search.'%');
                });
            }else{
                if($request->has('customer_id') && $request->get('customer_id') != 0 && $search == null){
                    $customerQuery = $customerQuery->where('id', $request->get('customer_id'));
                }
            }
            $customerQuery = $customerQuery->limit(10)->orderBy('id', 'desc')->get();

            return CustomerResource::collection($customerQuery);
        }
        $this->allowed('customers-access');
        $query = Customer::query()->with(['created_by_user']);
        $datatable = new DatatableBuilder($query, ['first_name','last_name','father_name', 'nic_number']);
        return CustomerResource::collection($datatable->build());
    }

    public function store(CustomerRequest $request)
    {
        $this->allowed('customers-create');
        $data = $request->validatedData();
        $customer = Customer::query()->create($data);
        Helpers::uploadFile($request->file('photo'), $customer->id, 'customer_files', 'photo');
        Helpers::uploadFile($request->file('nic_copy'), $customer->id, 'customer_files', 'nic_copy');
        return ['result' => true, 'message' => 'Customer created successfully', 'customer_id' => $customer->id];
    }

    public function show(Customer $customer)
    {
        $this->allowed('customers-access');
        $relation = ['photo', 'nic_copy'];
        if(\request()->has('load_province')){
            $relation[] = 'province';
        }
        return new CustomerResource($customer->load($relation));
    }

    public function update(Customer $customer, CustomerRequest $customerRequest)
    {
        $this->allowed('customers-update');
        $data = $customerRequest->validatedData();
        $customer->update($data);
        Helpers::uploadFile($customerRequest->file('photo'), $customer->id, 'customer_files', 'photo', true);
        Helpers::uploadFile($customerRequest->file('nic_copy'), $customer->id, 'customer_files', 'nic_copy', true);
        return ['result' => true, 'message' => 'Customer information updated successfully', 'customer_id' => $customer->id];
    }

    public function destroy(Customer $customer)
    {
        $this->allowed('customers-delete');
        $customer->update([
            'status' => 'deleted'
        ]);
        return ['result' => true, 'message' => 'Customer deleted successfully'];

    }
}
