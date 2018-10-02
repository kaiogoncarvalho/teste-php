<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Regras de validação
     *
     * @return array
     *
     * @author Kaio Gonçalves Carvalho <kaio.carvalho@pravaler.com.br>
     * @since 01/10/2018
     *
     */
    public function rules()
    {
        return [
            'quantity'=> 'required|integer',
            'product' => 'required|exists:products,id'
        ];
    }
}