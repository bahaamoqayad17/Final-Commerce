<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'total_price' => $this->total_price,
            'qty' => $this->qty,
            'user_id' => Auth::id(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
