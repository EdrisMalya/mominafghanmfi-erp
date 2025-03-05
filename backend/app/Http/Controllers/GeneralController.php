<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProvinceResource;
use App\Models\CountryProvince;
use App\Models\Province;
use Illuminate\Http\Request;

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
