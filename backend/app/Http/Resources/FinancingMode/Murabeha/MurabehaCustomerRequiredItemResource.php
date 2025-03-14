<?php

namespace App\Http\Resources\FinancingMode\Murabeha;

use App\Http\Resources\FileResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MurabehaCustomerRequiredItemResource extends JsonResource
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
            'item_name' => $this->item_name,
            'quantity' => $this->quantity,
            'quality' => $this->quality,
            'price_per_item' => $this->price_per_item,
            'formatted_price_per_item' => number_format($this->price_per_item),
            'supplier_name' => $this->supplier_name,
            'supplier_address' => $this->supplier_address,
            'has_supplier' => $this->has_supplier,
            'supplier_contact_number' => $this->supplier_contact_number,
            'supplier_document' => $this->whenLoaded('supplier_document', fn() => new FileResource($this->supplier_document)),
            'supplier_email' => $this->supplier_email,
            'total_price_pure' => $this->price_per_item * $this->quantity,
            'total_price' => number_format($this->price_per_item * $this->quantity),
        ];
    }
}
