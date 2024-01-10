<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome' => 'required|unique:itens|min:5|max:255|string',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'precisa preencher o campo kkk',
            'nome.unique' => 'nome n é unico',
            'nome.min' => 'tem q ter no minimo 5 caracteres',
        ];
    }
}
