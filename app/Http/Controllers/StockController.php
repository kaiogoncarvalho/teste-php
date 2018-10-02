<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockRequest;
use App\Product;
use App\Stock;
use Illuminate\Http\Request;
use Validator;

class StockController extends Controller
{
    public function create(StockRequest $request)
    {
        $product = Product::find($request->input('product'));

        $validator = Validator::make($request->all(), [
            'quantity' => 'gte:-' . $product->quantity,
        ],
            [
                'quantity.gte' => trans('stock.negative-error')
            ]

        );

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $previous = $product->quantity;
        $next = $product->quantity + $request->quantity;

        $product->quantity = $next;

        $product->save();

        Stock::create(
            [
                'product_id'        => $product->id,
                'quantity'          => $request->quantity,
                'next_quantity'     => $next,
                'previous_quantity' => $previous,
            ]
        );

        return back();
    }


}
