<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(StoreItemRequest $request)
    {
        // $user = Auth::user()->getAuthIdentifier();

        $data = $request->validated();

        Item::create($data);

        return redirect(route('cadastro.item.home'));
    }
}
