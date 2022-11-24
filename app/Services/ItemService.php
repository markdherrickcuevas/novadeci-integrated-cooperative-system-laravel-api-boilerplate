<?php


namespace App\Services;

use App\Models\Item;
use App\Traits\ApiResponses;
use App\Http\Resources\ItemResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ItemService
{
    use ApiResponses;

    public static function index()
    {
        return ItemResource::collection(
            Item::where('user_id', Auth::user()->id)->get()
        );
    }

    public static function store(StoreItemRequest $request)
    {
        $request->validated();

        $item = Item::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'description' => $request->description
        ]);

        return new ItemResource($item);
    }

    public static function show(Item $item)
    {
        return new ItemResource($item);
    }

    public static function update(UpdateItemRequest $request, Item $item)
    {
        if (Auth::user()->id !== $item->user_id) {
            return self::unauthorizedResponse('', 'You are not authorized to make this request');
        }

        $item->update($request->all());

        return new ItemResource($item);
    }

    public static function destroy(Item $item)
    {
        return self::isNotAuthorized($item) ? self::isNotAuthorized($item) : $item->delete();
    }

    private static function isNotAuthorized($task)
    {
        if (Auth::user()->id !== $task->user_id) {
            return self::unauthorizedResponse('', 'You are not authorized to make this request');
        }
    }
}
