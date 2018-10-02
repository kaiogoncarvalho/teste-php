<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $products = Product::where('quantity', '<', '4')->get();

        $stocks = Stock::select('name', 'product_id', 'stock.quantity', 'next_quantity', 'previous_quantity')->join('products', 'products.id', 'product_id')->orderBy('stock.updated_at', 'desc')->limit(5)->get();

        return view('home', [
            'products' => $products,
            'stocks'   => $stocks
        ]);
    }
}
