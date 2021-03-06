<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ClienteRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'endereco' => 'required',
            'numero' => 'required',
            'cidade' => 'required',
            'bairro' => 'required',
            'telefone' => 'required',
            'telefone2' => 'numeric'
        ];
    }
}
