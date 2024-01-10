<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Http\Requests\StoreSetorRequest;
use Illuminate\Support\Facades\Auth;

class SetorController extends Controller
{

    public function store(StoreSetorRequest $request)
    {
        // $user = Auth::user()->getAuthIdentifier();

        $data = $request->validated();

        Setor::create($data);

        return redirect(route('cadastro.setor.home'));
    }
}
