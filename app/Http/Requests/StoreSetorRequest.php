<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSetorRequest extends FormRequest
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
            'nome' => 'required|unique:setores|min:5|max:255|string'
        ];
    }


    public function messages(): array
    {
        return [
            'nome.required' => 'O nome não pode ser vazio.',
            'nome.unique' => 'Já existe um setor com esse nome.',
            'nome.min' => 'O nome deve ter mais do que 5 letras.',
            'nome.max' => 'O nome deve ter menos do que 255 letras.'
        ];
    }
}
