@extends('layouts.app')

@section('title')
    @lang('product.control')
@endsection

@section('head')
    <!-- Data table -->
    {{ Html::style('css/datatable/jquery.dataTables.min.css') }}

    <!-- Data table Bootstrap-->
    {{ Html::style('css/datatable/dataTables.bootstrap.min.css') }}

    <!-- Data table Buttons-->
    {{ Html::style('css/datatable/buttons.bootstrap.min.css') }}

    <!-- Data table Select -->
    {{ Html::style('css/datatable/select.bootstrap.min.css') }}

    <!-- Data table -->
    {{ Html::script('js/datatable/jquery.dataTables.min.js') }}

    <!-- Data table Bootstrap-->
    {{ Html::script('js/datatable/dataTables.bootstrap.min.js') }}

    <!-- Data table Buttons-->
    {{ Html::script('js/datatable/dataTables.buttons.min.js') }}
    {{ Html::script('js/datatable/buttons.bootstrap.min.js') }}

    <!-- Data table Select -->
    {{ Html::script('js/datatable/dataTables.select.min.js') }}

    <!-- Alerts Style -->
    {{ Html::style('css/jquery-confirm.min.css') }}

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div id="alert-unavailable" class="col-12 mt-4">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">@lang('product.control')</div>

                <div class="panel-body">
                    @if (session('alert'))
                        <div class="alert alert-{{ session('alert.type') }} alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {!! session('alert.message') !!}
                        </div>
                    @endif
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th>@lang('common.id')</th>
                            <th>@lang('common.name')</th>
                            <th>@lang('product.quantity')</th>
                            <th>@lang('product.price')</th>
                            <th>@lang('product.actions')</th>
                        </tr>
                        </thead>
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



