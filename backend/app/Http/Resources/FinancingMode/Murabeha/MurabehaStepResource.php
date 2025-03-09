<?php

namespace App\Http\Resources\FinancingMode\Murabeha;

use App\Http\Resources\CustomerDetailsResource;
use App\Http\Resources\CustomerServices\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MurabehaStepResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'step_1' => [
                'customer' => $this->whenLoaded('customer', fn() => new CustomerResource($this->customer))
            ],
            'step_2' => [
                'customer_other_info' => $this->whenLoaded('customer_details', fn() => new CustomerDetailsResource($this->customer_details))
            ],
        ];
    }
}
