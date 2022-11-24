<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Services\ItemService;
use App\Http\Requests\Item\StoreItemRequest;
use App\Http\Requests\Item\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ItemService::index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Item\StoreItemRequest 
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        return ItemService::store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  mixed $item
     * @return void
     */
    public function show(Item $item)
    {
        return ItemService::show($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        return ItemService::update($request, $item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        return ItemService::destroy($item);
    }
}
