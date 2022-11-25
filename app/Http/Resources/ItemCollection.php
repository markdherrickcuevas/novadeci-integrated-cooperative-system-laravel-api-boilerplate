<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ItemCollection extends ResourceCollection
{
    public static $wrap = '';

    public function toArray($request): array
    {
        return [
            'items' => $this->collection,
            'itemCount' => $this->count()
        ];
    }
}