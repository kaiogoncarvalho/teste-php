@extends('layouts.app')

@section('title')
    @lang('product.control')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('product.stock_3')</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>@lang('common.id')</th>
                            <th>@lang('common.name')</th>
                            <th>@lang('product.quantity')</th>
                            <th>@lang('product.price')</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{ $product->id }}
                                    </td>
                                    <td>
                                        {{ $product->name }}
                                    </td>
                                    <td>
                                        {{ $product->quantity }}
                                    </td>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('stock.movement')</div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>@lang('common.id')</th>
                            <th>@lang('common.name')</th>
                            <th>@lang('product.moviment_quantity')</th>
                            <th>@lang('product.previous_quantity')</th>
                            <th>@lang('product.next_quantity')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>
                                    {{ $stock->product_id }}
                                </td>
                                <td>
                                    {{ $stock->name }}
                                </td>
                                <td>
                                    {{ $stock->quantity }}
                                </td>
                                <td>
                                    {{ $stock->previous_quantity }}
                                </td>
                                <td>
                                    {{ $stock->next_quantity }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    {{ Html::script('js/jquery-confirm.min.js') }}
    {{ Html::script('js/datatable/datatable.js') }}
@endsection



