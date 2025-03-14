<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProvinceResource;
use App\Models\AssetType;
use App\Models\BusinessType;
use App\Models\CountryProvince;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GeneralController extends Controller
{
    private function handleGet($what){
        switch ($what){
            case 'province':
                return ProvinceResource::collection(
                    Province::query()->get()
                );
        }
    }

    public function countryProvinces()
    {
        return CountryProvince::query()->where('active', true)->get();
    }
    public function assetTypes(Request $request)
    {
        switch ($request->method()){
            case 'GET':
                return AssetType::query()->where('status', true)->orderBy('id', 'desc')->get();
            case 'POST':
                $data = $request->validate([
                    'name' => ['required', 'string', 'min:1', Rule::unique('asset_types')]
                ]);
                $asset = AssetType::query()->create($data);
                return ['result' => true, 'message' => 'Created successfully', 'created_id' => $asset->id];
            case 'DELETE':
                $this->allowed('asset-types-delete');
                AssetType::query()->findOrFail($request->get('id'))->delete();
                return ['result' => true, 'message' => 'Deleted successfully'];
            case 'PUT':
                $this->allowed('asset-types-delete');
                $asset = AssetType::query()->findOrFail($request->get('id'));
                $data = $request->validate([
                    'name' => ['required', 'string', 'min:1', Rule::unique('asset_types')->ignore($asset)]
                ]);
                $asset->update($data);
                return ['result' => true, 'message' => 'Deleted successfully'];
        }
    }

    public function businessTypes(Request $request)
    {
        switch ($request->method()){
            case 'GET':
                return BusinessType::query()->where('status', true)->orderBy('id', 'desc')->get();
            case 'POST':
                $data = $request->validate([
                    'name' => ['required', 'string', 'min:1', Rule::unique('business_types')]
                ]);
                $data['created_by'] = auth()->id();
                $business_type = BusinessType::query()->create($data);
                return ['result' => true, 'message' => 'Created successfully', 'created_id' => $business_type->id];
            case 'DELETE':
                $this->allowed('asset-types-delete');
                AssetType::query()->findOrFail($request->get('id'))->delete();
                return ['result' => true, 'message' => 'Deleted successfully'];
            case 'PUT':
                $this->allowed('asset-types-delete');
                $asset = AssetType::query()->findOrFail($request->get('id'));
                $data = $request->validate([
                    'name' => ['required', 'string', 'min:1', Rule::unique('asset_types')->ignore($asset)]
                ]);
                $asset->update($data);
                return ['result' => true, 'message' => 'Deleted successfully'];
        }
    }

    private function handlePost($what){

    }
    private function handlePut($what){

    }

    private function handleDelete($what){

    }

    public function what(Request $request, $what){
        switch ($request->getMethod()){
            case "GET":
                return $this->handleGet($what);
                break;
            case 'POST':
                return $this->handlePost($what);
                break;
            case 'PUT':
                return $this->handlePut($what);
                break;
            case 'DELETE':
                return $this->handleDelete($what);
                break;

        }
    }
}
