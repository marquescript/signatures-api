<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'user_id' => $this->user_id,
            'document' => $this->document,
            'birthdate' => $this->birthdate->format('Y-m-d'),
            'user' => new UserResource($this->whenLoaded('user'))
        ];
    }
}
