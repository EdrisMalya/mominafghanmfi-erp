<?php

namespace App\Http\Resources\FinancingMode\Murabeha;

use App\Http\Resources\CustomerServices\CustomerResource;
use App\Http\Resources\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MurabehaResource extends JsonResource
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
            'customer' => $this->whenLoaded('customer', fn() => new CustomerResource($this->customer)),
            'created_by' => $this->whenLoaded('created_by_user', fn() => new UserResource($this->created_by_user)),
            'status' => $this->status,
            'created_at' => Carbon::make($this->created_at)->format('Y-m-d  h:i:s A'),
            'updated_at' => Carbon::make($this->created_at)->format('Y-m-d  h:i:s A'),
        ];
    }
}
