<?php
/**
 * Created by PhpStorm.
 * User: kaio
 * Date: 30/09/18
 * Time: 23:44
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'price'       => 'required|regex:/^R\$ (\d{1,3}\.)*\d{1,3},\d{2}$/',
            'quantity'    => 'required|integer|min:0',
            'active'      => 'optional|boolean'
        ];
    }
}