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
                    {{ Form::open(['route' => 'password.request', 'role' => 'form', 'class' => 'form-horizontal']) }}

                        {{ Form::hidden('token', $token) }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{
                               Form::label('email', trans('common.email_address'), ['class' => 'col-md-4 control-label'])
                            }}

                            <div class="col-md-6">
                                {{
                                   Form::text(
                                       'email',
                                        isset($email) ? $email : old('email'),
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

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{
                                Form::label('password', trans('common.password'), ['class' => 'col-md-4 control-label'])
                             }}

                            <div class="col-md-6">
                                {{
                                   Form::password(
                                       'password',
                                       [
                                           'class'                            => 'form-control',
                                           'data-validation'                  => 'required length',
                                           'data-validation-length'           => 'min6',
                                           'data-validation-error-msg-length' => 'Senha deve ter mais que 6 caracteres'
                                       ]
                                   )
                               }}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            {{
                               Form::label('password_confirmation', trans('common.confirm_password'), ['class' => 'col-md-4 control-label'])
                            }}
                            <div class="col-md-6">
                                {{
                                   Form::password(
                                      'password_confirmation',
                                      [
                                          'class'                                  => 'form-control',
                                          'data-validation'                        => 'confirmation',
                                          'data-validation-confirm'                => 'password',
                                          'data-validation-error-msg-confirmation' => 'Confirmação de senha está incorreta'
                                      ]
                                   )
                              }}
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    @lang('auth.reset_password')
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('components.validation')
@endsection