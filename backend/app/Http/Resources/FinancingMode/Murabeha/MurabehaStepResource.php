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
                'customer_other_info' => $this->whenLoaded('customer_details', fn() => new CustomerDetailsResource($this->customer_details)),
                'is_completed' => $this->step_2_completed
            ],
            'step_3' => [
                'customer_asset_info' => $this->whenLoaded('customer_assets', fn () => MurabehaCustomerAssetResource::collection($this->customer_assets)),
                'is_completed' => $this->step_3_completed
            ],
            'step_4' => [
                'customer_borrowing_info' => $this->whenLoaded('customer_old_borrowings', fn () => MurabehaCustomerOldBorrowingResource::collection($this->customer_old_borrowings)),
                'is_completed' => $this->step_4_completed
            ],
            'step_5' => [
                'customer_requested_items' => $this->whenLoaded('customer_requested_items', fn () => MurabehaCustomerRequiredItemResource::collection($this->customer_requested_items), []),
                'is_completed' => $this->step_5_completed,
                'grand_total' => $this->customer_requested_items->sum('total_price'),
                'formatted_grand_total' => number_format($this->customer_requested_items->sum('total_price')),
            ],
        ];
    }
}

