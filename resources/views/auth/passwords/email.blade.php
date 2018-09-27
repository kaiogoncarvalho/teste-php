@extends('layouts.app')

@section('title')
    @lang('passwords.reset_password')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">@lang('passwords.reset_password')</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ Form::open(['route' => 'password.email', 'role' => 'form', 'class' => 'form-horizontal']) }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{
                                Form::label('email', trans('common.email_address'), ['class' => 'col-md-4 control-label'])
                             }}
                            <div class="col-md-6">
                                {{
                                    Form::text(
                                        'email',
                                         old('email'),
                                        [
                                            'class'           => 'form-control',
                                            'data-validation' => 'required email',
                                            'autofocus'       => true,
                                        ]
                                    )
                                }}

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('passwords.send_link')
                                </button>
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
    @include('components.validation')
@endsection