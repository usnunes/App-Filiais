<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FilialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules =  [
            'nome'          => 'required|string|min:3|max:100',
            'cidade'        => 'required|string|min:3|max:50',
            'cnpj'          => 'required|cnpj|max:18|unique:filiais,cnpj',
            'endereco'      => 'required|min:5',
            'email'         => 'required|string|email|max:100|unique:filiais,email',
            'longitude'     => 'required',
            'latitude'      => 'required'
        ];

        if ($this->method() == 'PUT'){
            $rules['email'] = 'required|string|email|max:100|unique:filiais,id,'.$this->get('id');
            $rules['cnpj'] = 'required|cnpj|max:18|unique:filiais,id,'.$this->get('id');
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required'  => 'Este campo é obrigatório.',
            'min'       => 'Este campo deve ter no mínimo :min caracteres.',
            'max'       => 'Este campo deve ter no máximo :max caracteres.',
            'unique'    => 'Já existe um registro com esta informação.',
            'string'    => 'Este campo deve ser preenchido com texto.',
            'email'     => 'Este EMAIL já foi cadastrado.'
        ];
    }
}
