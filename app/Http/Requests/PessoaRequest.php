<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email'],
            'categoria_id' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome do produto é obrigatório!',
            'nome.max' => 'O nome esta ultrapassando o valor maximo!',
            'categoria_id.required'=> 'Categoria é obrigatório!',
            'email.required'=> 'E-mail é obrigatório!',
            'email.email'=> 'E-mail não é Valido!'
        ];
    }

    
}
