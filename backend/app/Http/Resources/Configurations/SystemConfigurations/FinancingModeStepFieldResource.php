<?php

namespace App\Http\Resources\Configurations\SystemConfigurations;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FinancingModeStepFieldResource extends JsonResource
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
            'order' => $this->order,
            'field_name' => $this->field_name,
            'width' => $this->width,
            'field' => json_decode($this->field, true),
        ];
    }
}
