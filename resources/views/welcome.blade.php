<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @lang('common.system-control-product')</title>

    <!-- Fonts -->
{{ Html::style('https://fonts.googleapis.com/css?family=Raleway:100,600') }}

<!-- Styles -->
    {{ Html::style('css/welcome.css') }}
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            @lang('common.system-control-product')
        </div>

        <div class="links">
            @if (Auth::check())
                {{ link_to_route('home', trans('common.home')) }}
                {{ link_to_route('products', trans('product.control')) }}
            @else
                {{ link_to_route('login', trans('common.login')) }}
                {{ link_to_route('register', trans('common.register')) }}
            @endif
        </div>
    </div>
</div>
</body>
</html>
