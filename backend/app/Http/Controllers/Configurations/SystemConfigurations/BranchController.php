<?php

namespace App\Http\Controllers\Configurations\SystemConfigurations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configurations\SystemConfigurations\BranchRequest;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
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
