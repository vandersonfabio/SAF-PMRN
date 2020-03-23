<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ViaturaFormRequest extends FormRequest
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
            'chassi'=>'required|max:17',
            'placa'=>'required|max:7',
            'prefixo'=>'required|max:10',
            'ano'=>'required',
            'aquisicao'=>'required',
            'isOperant'=>'required',
            'recebimento'=>'required',
            'idModelo'=>'required',
            'idProprietario'=>'required',
            'idUnidade'=>'required'
        ];
    }
}
