<?php

namespace App\Http\Resources\Configurations\SystemConfigurations;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
            'name' => $this->name,
            'location' => $this->location,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'is_main' => $this->is_main,
            'status' => $this->status,
            'status_text' => $this->status?'Active':'Inactive',
            'branch_manager' => $this->whenLoaded('branch_manager', fn() => new UserResource($this->branch_manager)),
        ];
    }
}
