<?php

namespace App\Http\Resources\CustomerServices;

use App\Http\Resources\FileResource;
use App\Http\Resources\UserResource;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'test' => $this->id,
            'full_name' => $this->first_name.' '.$this->last_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'father_name' => $this->father_name,
            'nic_number' => $this->nic_number,
            'province_id' => $this->province_id,
            'district' => $this->district,
            'village' => $this->village,
            'dob' => $this->dob,
            'age' => Carbon::make($this->dob)->age,
            'created_by_user' => $this->whenLoaded('created_by_user', fn () => new UserResource($this->created_by_user)),
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'province' => $this->whenLoaded('province', fn() => $this->province),
            'photo' => $this->whenLoaded('photo', fn()=> new FileResource(
                $this->photo,
            )),
            'nic_copy' => $this->whenLoaded('nic_copy', fn()=> new FileResource(
                $this->nic_copy,
            )),
        ];
    }
}
