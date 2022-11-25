<?php


namespace App\Services;

use App\Models\Item;
use App\Http\Resources\ItemResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use App\Traits\ApiResponses;

class ItemService
{
    use ApiResponses;

    public function getAll()
    {
        return ItemResource::collection(
            Item::where('user_id', Auth::user()->id)->get()
        );
    }

    public function getById(Item $item)
    {
        return new ItemResource($item);
    }

    public static function getItems()
    {
        return ItemResource::collection(
            Item::where('user_id', Auth::user()->id)->get()
        );
    }

    public static function saveItem(StoreItemRequest $request)
    {
        $request->validated();

        $item = Item::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return new ItemResource($item);
    }

    public static function updateItem(UpdateItemRequest $request, Item $item)
    {
        if (Auth::user()->id !== $item->user_id) {
            return self::unauthorizedResponse('', 'You are not authorized to update this item.');
        }

        $item->update($request->all());

        return new ItemResource($item);
    }

    public static function deleteItem(Item $item)
    {
        return self::checkIfUserIsAuthorized($item) ? self::checkIfUserIsAuthorized($item) : $item->delete();
    }

    private static function checkIfUserIsAuthorized($task)
    {
        if (Auth::user()->id !== $task->user_id) {
            return self::unauthorizedResponse('', 'You are not authorized to make this request');
        }
    }
}
