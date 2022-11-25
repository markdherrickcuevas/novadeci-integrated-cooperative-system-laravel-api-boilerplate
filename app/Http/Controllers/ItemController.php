<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Services\ItemService;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index()
    {
        return $this->itemService->getAll();
    }

    public function show(Item $item)
    {
        return $this->itemService->getById($item);
    }

    public function store(StoreItemRequest $request)
    {
        return $this->itemService->saveItem($request);
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        return $this->itemService->updateItem($request, $item);
    }

    public function destroy(Item $item)
    {
        return $this->itemService->deleteItem($item);
    }
}
