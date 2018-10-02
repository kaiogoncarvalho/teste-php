<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.home');
    }

    /**
     * Retorna view para criar produto
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @author Kaio Gonçalves Carvalho <kaio.carvalho@pravaler.com.br>
     * @since 27/09/2018
     *
     */
    public function showCreate()
    {
        return view('product.new_edit', [ 'method'  => "POST" ]);
    }

    public function create(ProductRequest $request)
    {
        $product =  Product::create($request->all());

        return $product;
    }

    /**
     * Retorna os Produtos
     *
     * @param Request $request
     * @return array
     *
     * @author Kaio Gonçalves Carvalho <kaio.carvalho@pravaler.com.br>
     * @since 01/10/2018
     *
     */
    public function datatable(Request $request)
    {
        $products = Product::select('*');

        $total = $products->count();

        if( $request->has('search.value') ){
            $products
                ->where('name', 'like', '%'.$request->input('search.value').'%')
                ->orWhere('description', 'like',  '%'.$request->input('search.value').'%')
                ->get();
        }



        $filtered = $products->count();

        $request->input('order.0.column', '2');
        $request->input('order.0.dir', 'asc');
        $request->input('order.1.column', '4');
        $request->input('order.1.dir', 'asc');


        foreach( $request->input('order') as $order){
            $orderColumnName = $request->input("columns.".$order['column'].".name", 'name');
            $products->orderBy($orderColumnName, $order['dir']);
        }

        return [
            'draw' => $request->input('draw'),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $products->get()
        ];
    }

    public function showEdit($id)
    {
        $product = Product::findOrFail($id);

        return view(
            'product.new_edit',
            [
                'method'  => "PUT",
                'product' => $product,
            ]
        );
    }

    public function edit($id, ProductRequest $request)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()
            ->route('products')
            ->with('alert', ['type' => 'success', 'message' => trans('product.edit_success')]);
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()
            ->route('products')
            ->with('alert', ['type' => 'success', 'message' => trans('product.delete_success')]);
    }
}
