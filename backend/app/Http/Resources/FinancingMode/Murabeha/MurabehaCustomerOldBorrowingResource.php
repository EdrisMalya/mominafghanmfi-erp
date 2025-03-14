<?php

namespace App\Http\Resources\FinancingMode\Murabeha;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MurabehaCustomerOldBorrowingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }
}
