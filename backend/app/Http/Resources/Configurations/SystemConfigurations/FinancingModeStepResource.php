<?php

namespace App\Http\Resources\Configurations\SystemConfigurations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FinancingModeStepResource extends JsonResource
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
            'name' => $this->step_name,
            'required' => $this->required,
            'fields' => $this->whenLoaded('fields', fn() => FinancingModeStepFieldResource::collection($this->fields)),
        ];
    }
}
