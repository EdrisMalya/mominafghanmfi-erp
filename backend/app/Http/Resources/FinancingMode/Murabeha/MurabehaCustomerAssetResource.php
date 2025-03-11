<?php

namespace App\Http\Resources\FinancingMode\Murabeha;

use App\Http\Resources\FileResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MurabehaCustomerAssetResource extends JsonResource
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
            'asset' => $this->asset,
            'asset_type' => $this->whenLoaded('asset_type', fn() => $this->asset_type),
            'legal_document' => $this->whenLoaded('legal_document', fn() => new FileResource($this->legal_document)),
            'value' => $this->value,
            'formated_value' => number_format($this->value),
        ];
    }
}
