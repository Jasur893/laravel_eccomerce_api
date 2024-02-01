<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'sum' => $this->sum,
            'user' => $this->user,
            'status' => $this->status,
            'products' => $this->products,
            'address' => $this->address,
            'payment_type' => $this->paymentType,
            'delivery-method' => $this->deliveryMethod,
        ];
    }
}
