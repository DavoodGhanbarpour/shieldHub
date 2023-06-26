<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InboundResource extends JsonResource
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
            'title' => $this->title,
            'ip' => $this->ip,
            'port' => $this->port,
            'link' => $this->link,
            'date' => $this->date,
            'description' => $this->description,
            'users_count' => $this->users_count,
        ];
    }
}
