<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CallLogResource extends JsonResource
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
            'called_user' => $this->called_user,
            'country_network' => $this->country_network,
            'caller_id' => $this->caller_id,
            'duration' => $this->duration,
            'cost_euro' => $this->cost_euro,
            'cost_usd' => $this->cost_euro * 1.08,
            'date' => $this->date,
            'status' => $this->status,
            'registered_number' => $this->user->registered_number

        ];
    }
}
