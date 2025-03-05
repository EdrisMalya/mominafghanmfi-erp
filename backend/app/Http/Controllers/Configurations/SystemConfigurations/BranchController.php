<?php

namespace App\Http\Controllers\Configurations\SystemConfigurations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configurations\SystemConfigurations\BranchRequest;
use App\Http\Resources\Configurations\SystemConfigurations\BranchResource;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $query = Branch::query()->where('status', true);
        if(\request()->has('province_id')){
            $query = $query->where('province_id', \request()->get('province_id'));
        }
        if(\request()->has('for-api')){
            return BranchResource::collection($query->get());
        }
        $this->allowed('branch-configurations-access');
    }

    public function store(BranchRequest $request)
    {
        $this->allowed('branch-configurations-create');
        $data = $request->validatedData();
        Branch::create($data);
        return ['result' => true, 'message' => 'Saved successfully'];
    }

    public function update(Branch $branch, BranchRequest $request)
    {
        $this->allowed('branch-configurations-update');
        $data = $request->validatedData();
        $branch->update($data);
        return ['result' => true, 'message' => 'Saved successfully'];
    }

    public function destroy(Branch $branch)
    {
        $this->allowed('branch-configurations-delete');
        $branch->delete();
        return ['result' => true, 'message' => 'Delete successfully'];
    }
}
