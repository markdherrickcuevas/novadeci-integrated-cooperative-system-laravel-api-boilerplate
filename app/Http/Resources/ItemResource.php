<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public static $wrap = 'item';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => (string)$this->id,
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at
            ],
            'user' => [
                'id' => (string)$this->user->id,
                'name' => $this->user->name,
                'username' => $this->user->username
            ]
        ];
    }
}
