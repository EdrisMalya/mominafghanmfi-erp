<?php

namespace App\Http\Controllers\Configurations\SystemConfigurations;

use App\Http\Controllers\Controller;
use App\Http\Requests\Configurations\SystemConfigurations\SystemConfigurationsRequest;
use App\Http\Requests\UserProfileRequest;
use App\Http\Resources\Configurations\SystemConfigurations\SystemConfigurationsResource;
use App\Models\SystemConfigurations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SystemConfigurationsController extends Controller
{
    public function config(Request $request)
    {
        $this->allowed('system-configurations-update-system-configurations');
        switch ($request->method()){
            case 'GET':
                return new SystemConfigurationsResource(SystemConfigurations::query()->first());
            case 'POST':
                $validator = Validator::make($request->all(), (new SystemConfigurationsRequest())->rules());

                if ($validator->fails()) {
                    return response()->json(['errors' => $validator->errors()], 422);
                }
                $data = $validator->validated();
                $data['created_by'] = auth()->id();
                SystemConfigurations::updateOrCreate(
                    ['id' => SystemConfigurations::query()->first()?->id ?? 0], // Search by ID (fallback to 0 if no record exists)
                    $data
                );;

                return ['result' => true, 'message' => 'Configs saved successfully'];
        }
    }
}
