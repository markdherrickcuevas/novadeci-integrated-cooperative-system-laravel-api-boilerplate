<?php


namespace App\Services;

use App\Models\Item;
use App\Traits\ApiResponses;
use App\Http\Resources\ItemResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ItemCollection;
use App\Http\Requests\Item\StoreRequest;
use App\Http\Requests\Item\UpdateRequest;

class ItemService
{
    use ApiResponses;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function getAll(): ItemCollection
    {
        return new ItemCollection($this->item->where('user_id', Auth::user()->id)->get());
    }

    public function getById(Item $item): ItemResource
    {
        return new ItemResource($item);
    }

    public static function saveItem(StoreRequest $request): ItemResource
    {
        $request->validated();

        $item = Item::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return new ItemResource($item);
    }

    public static function updateItem(UpdateRequest $request, Item $item): ItemResource
    {
        if (Auth::user()->id !== $item->user_id) {
            return self::unauthorizedResponse('', 'You are not authorized to update this item.');
        }

        $item->update($request->all());

        return new ItemResource($item);
    }

    public static function deleteItem(Item $item): void
    {
        return self::checkIfUserIsAuthorized($item) ? self::checkIfUserIsAuthorized($item) : $item->delete();
    }

    private static function checkIfUserIsAuthorized($item)
    {
        if (Auth::user()->id !== $item->user_id) {
            return self::unauthorizedResponse('', 'You are not authorized to make this request');
        }
    }
}
