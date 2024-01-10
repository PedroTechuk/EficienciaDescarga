<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSolicitacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'valor_estimado' => 'required|max:255',
            'categoria' => 'required|max:255',
            'item' => 'required|max:255',
            'subcategoria' => 'required|max:255',
            'fornecedor' => 'required|max:255',
            'link' => 'required|max:255',
            'descricao' => 'required|max:255',
            'nivel_impacto' => 'required|max:255',
            'prazo_estimado' => 'required',
            'mes_pagamento' => 'required',
            'usuario' => '',
        ];
    }

    public function messages(): array
    {
        return [
            'valor_estimado.required' => 'O valor não pode ser vazio.',
            'categoria.required' => 'A categoria não pode ser vazio.',
            'item.required' => 'O item não pode ser vazio.',
            'subcategoria.required' => 'A sub-categoria não pode ser vazio.',
            'fornecedor.required' => 'O fornecedor não pode ser vazio.',
            'link.required' => 'O link não pode ser vazio.',
            'descricao.required' => 'A descrição não pode ser vazio.',
            'nivel_impacto.required' => 'O nivel de impacto não pode ser vazio.',
            'prazo_estimado.required' => 'O prazo não pode ser vazio.',
            'mes_pagamento.required' => 'O mês não pode ser vazio.',
        ];
    }
}
