<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolicitacaoRequest;
use App\Models\Item;
use App\Models\Setor;
use App\Models\Categoria;
use App\Models\SubCategoria;
use App\Models\Fornecedor;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class SolicitacaoController extends Controller
{
    public function create(Request $request)
    {
        $itens = Item::all();
        $categorias = Categoria::all();
        $subCategorias = SubCategoria::all();
        $setores = Setor::all();
        $fornecedores = Fornecedor::all();

        return view('me.nova-solicitacao', [
            'itens' => $itens,
            'categorias' => $categorias,
            'subcategorias' => $subCategorias,
            'setores' => $setores,
            'fornecedores' => $fornecedores,
        ])->layout('layouts.app');
    }

    public function store(StoreSolicitacaoRequest $request)
    {
        // $user = Auth::user()->getAuthIdentifier();

        $data = $request->validated();

        // Solicitacao::create($data);

        // return redirect(route('me.solicitacoes'));

        dd($data);
    }
}
