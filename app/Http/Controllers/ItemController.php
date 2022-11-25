<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Services\ItemService;
use App\Http\Requests\Item\StoreRequest;
use App\Http\Requests\Item\UpdateRequest;
use App\Http\Resources\ItemCollection;
use App\Http\Resources\ItemResource;

class ItemController extends Controller
{
    protected $itemService;

    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index(): ItemCollection
    {
        return $this->itemService->getAll();
    }

    public function show(Item $item): ItemResource
    {
        return $this->itemService->getById($item);
    }

    public function store(StoreRequest $request): ItemResource
    {
        return $this->itemService->saveItem($request);
    }

    public function update(UpdateRequest $request, Item $item):ItemResource
    {
        return $this->itemService->updateItem($request, $item);
    }

    public function destroy(Item $item): void
    {
        return $this->itemService->deleteItem($item);
    }
}
