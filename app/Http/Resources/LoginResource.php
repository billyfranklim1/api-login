<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => [
                'name' => $this->resource->name,
                'email' => $this->resource->email,
                'username' => $this->resource->username,
            ],
            'token' => $this->resource->createToken('token')->plainTextToken,
        ];
    }
}
