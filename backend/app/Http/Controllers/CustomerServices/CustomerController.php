<?php

namespace App\Http\Controllers\CustomerServices;

use App\Helpers\DatatableBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerServices\CustomerRequest;
use App\Http\Resources\CustomerServices\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
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
        return ['result' => true, 'message' => 'Customer created successfully', 'customer_id' => $customer->id];
    }

    public function show(Customer $customer)
    {
        $this->allowed('customers-access');
        return new CustomerResource($customer);
    }

    public function update(Customer $customer, CustomerRequest $customerRequest)
    {
        $this->allowed('customers-update');
        $data = $customerRequest->validatedData();
        $customer->update($data);
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
