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
        return view('product.new_edit');
    }

    public function create(ProductRequest $request)
    {
        $product =  Product::create($request->all());

        return $product;
    }
}
