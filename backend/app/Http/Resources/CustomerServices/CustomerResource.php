<?php

namespace App\Http\Resources\CustomerServices;

use App\Http\Resources\UserResource;
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
            'full_name' => $this->first_name.' '.$this->last_name,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'father_name' => $this->father_name,
            'nic_number' => $this->nic_number,
            'province_id' => $this->province_id,
            'district' => $this->district,
            'village' => $this->village,
            'created_by_user' => $this->whenLoaded('created_by_user', fn () => new UserResource($this->created_by_user)),
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
