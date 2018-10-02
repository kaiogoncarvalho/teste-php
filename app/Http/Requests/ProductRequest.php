<?php


namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Classe responsável pela validação de Produto
 *
 * Class ProductRequest
 * @package App\Http\Requests
 *
 * @author Kaio Gonçalves Carvalho <kaio.carvalho@pravaler.com.br>
 * @since 01/10/2018
 *
 */
class ProductRequest extends FormRequest
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
            'name'        => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'price'       => 'required|regex:/^R\$ (\d{1,3}\.)*\d{1,3},\d{2}$/',
            'quantity'    => 'required|integer|min:0',
            'active'      => 'optional|boolean',
        ];
    }

    /**
     * Nome dos Campos
     *
     * @return array
     *
     * @author Kaio Gonçalves Carvalho <kaio.carvalho@pravaler.com.br>
     * @since 01/10/2018
     *
     */
    public function attributes()
    {
        return [
            'name'        => trans('common.name'),
            'description' => trans('product.description'),
            'price'       => trans('product.price'),
            'quantity'    => trans('product.quantity'),
            'active'      => trans('product.active'),
        ];
    }

    /**
     * Mensagens de erro personalizadas
     *
     * @return array
     *
     * @author Kaio Gonçalves Carvalho <kaio.carvalho@pravaler.com.br>
     * @since 01/10/2018
     *
     */
    public function messages()
    {
        return [
          'price.regex' => trans('product.price-format', ['attribute' => trans('product.price'), 'format' => 'R$ 9.999,99'])
        ];
    }
}