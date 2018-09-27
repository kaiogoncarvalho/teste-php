@extends('layouts.app')

@section('title')
    @if(isset($product))
        @lang('product.edit')
    @else
        @lang('product.register')
    @endif
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(isset($product))
                            @lang('product.edit')
                        @else
                            @lang('product.register')
                        @endif
                    </div>
                    <div class="panel-body">
                        {{ Form::open(['url' => 'product', 'method' => 'POST', 'role' => 'form', 'class' => 'form-horizontal', 'id' => 'form-product']) }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{
                                Form::label('name', trans('common.name'), ['class' => 'col-md-4 control-label'])
                             }}

                            <div class="col-md-6">

                                {{
                                    Form::text(
                                        'name',
                                        isset($product->name) ? $product->name : old('name'),
                                        [
                                            'class'                  => 'form-control',
                                            'data-validation'        => 'required length',
                                            'data-validation-length' => 'max100',
                                        ]
                                    )
                                 }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            {{
                                Form::label('description', trans('product.description'), ['class' => 'col-md-4 control-label'])
                             }}

                            <div class="col-md-6">
                                {{
                                    Form::textarea(
                                        'description',
                                        isset($product->description) ? $product->description : old('description'),
                                        [
                                            'class'                  => 'form-control',
                                            'data-validation'        => 'required length',
                                            'data-validation-length' => 'max255',
                                        ]
                                    )
                                }}

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            {{
                                Form::label('quantity', trans('product.quantity'), ['class' => 'col-md-4 control-label'])
                             }}

                            <div class="col-md-6">
                                {{
                                    Form::number(
                                        'quantity',
                                        isset($product->quantity) ? $product->quantity : old('quantity'),
                                        [
                                            'data-validation'          => 'required number',
                                            'data-validation-allowing' => 'integer,positive',
                                            'class'                    => 'form-control',
                                        ]
                                    )

                                }}

                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            {{
                                Form::label('price', trans('product.price'), ['class' => 'col-md-4 control-label'])
                             }}

                            <div class="col-md-6">
                                {{
                                   Form::text(
                                       'price',
                                       isset($product->price) ? $product->price : old('price'),
                                       [
                                           'data-validation'                  => 'required date',
                                           'class'                            => 'form-control',
                                           'id'                               => 'end_date',
                                       ]
                                   )

                                }}
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button @if (isset($disabled) && $disabled == true) disabled @endif type="submit"
                                        class="btn btn-success">
                                    @if(isset($product))
                                        @lang('product.editing')
                                    @else
                                        @lang('product.creating')
                                    @endif
                                </button>
                                {{
                                    link_to_route('products', trans('product.back'),[] ,['class' => 'btn btn-danger'])
                                }}
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    {{ Html::script('js/moment/moment.min.js') }}
    {{ Html::style('css/bootstrap-datetimepicker.min.css') }}
    {{ Html::script('js/datetimepicker/bootstrap-datetimepicker.js') }}
    {{ Html::script('js/moment/locales/pt-br.js') }}
    @include('components.validation')
    @include('components.mask-money')

@endsection