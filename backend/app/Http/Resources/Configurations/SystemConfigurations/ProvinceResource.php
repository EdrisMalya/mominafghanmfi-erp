<?php

namespace App\Http\Resources\Configurations\SystemConfigurations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceResource extends JsonResource
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
            'branches' => $this->whenLoaded('branches', fn()=> BranchResource::collection($this->branches)),
        ];
    }
}
