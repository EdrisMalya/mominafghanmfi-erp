<?php

namespace App\Http\Resources\Configurations\SystemConfigurations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FinancingModeResource extends JsonResource
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
            'default_mode' => $this->default_mode,
            'status' => $this->status,
            'steps' => $this->whenLoaded('steps', fn() => FinancingModeStepResource::collection($this->steps)),
        ];
    }
}
