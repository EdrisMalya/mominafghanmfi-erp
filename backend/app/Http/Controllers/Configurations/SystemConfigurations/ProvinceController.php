<?php

namespace App\Http\Controllers\Configurations\SystemConfigurations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configurations\SystemConfigurations\ProvinceRequest;
use App\Http\Resources\Configurations\SystemConfigurations\ProvinceResource;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        $query = Province::query()->get();
        if(\request()->has('for-api')){
            return ProvinceResource::collection($query);
        }
        $this->allowed('branch-configurations-access');
        return ProvinceResource::collection($query->load(['branches.branch_manager']));
    }

    public function store(ProvinceRequest $request)
    {
        $this->allowed('branch-configurations-access');
        $data = $request->validatedData();
        Province::query()->create($data);
        return ['result' => true, 'message' => 'Saved successfully'];
    }

    public function update(Province $branch_province, ProvinceRequest $request)
    {
        $this->allowed('branch-configurations-access');
        $data = $request->validatedData();
        $branch_province->update($data);
        return ['result' => true, 'message' => 'Updated successfully'];
    }

    public function destroy(Province $branch_province)
    {
        $this->allowed('branch-configurations-access');
        if($branch_province->branches->count() > 0){
            return ['result' => false, 'message' => 'This province has branches and delete is not possible'];
        }
        $branch_province->delete();
        return ['result' => true, 'message' => 'Deleted successfully'];
    }
}
