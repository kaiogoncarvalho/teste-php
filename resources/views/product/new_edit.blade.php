@extends('layouts.app')

@section('title')
    @if(isset($activity))
        @lang('activity.edit')
    @else
        @lang('common.register')
    @endif
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if(isset($activity))
                        @lang('activity.edit')
                    @else
                        @lang('common.register')
                    @endif
                </div>
                <div class="panel-body">
                    @if ($disabled == true)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            @lang('activity.not_editable')
                        </div>
                    @endif
                    {{ Form::open(['url' => $route, 'role' => 'form', 'class' => 'form-horizontal', 'id' => 'form-activity']) }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{
                                Form::label('name', trans('common.name'), ['class' => 'col-md-4 control-label'])
                             }}

                            <div class="col-md-6">

                                {{
                                    Form::text(
                                        'name',
                                        isset($activity->name) ? $activity->name : old('name'),
                                        [
                                            'class'                  => 'form-control',
                                            'data-validation'        => 'required length',
                                            'data-validation-length' => 'max255',
                                            'disabled'               => isset($disabled) ? $disabled : false
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
                                Form::label('description', trans('activity.description'), ['class' => 'col-md-4 control-label'])
                             }}

                            <div class="col-md-6">
                                {{
                                    Form::textarea(
                                        'description',
                                        isset($activity->description) ? $activity->description : old('description'),
                                        [
                                            'class'                  => 'form-control',
                                            'data-validation'        => 'required length',
                                            'data-validation-length' => 'max600',
                                            'disabled'               => isset($disabled) ? $disabled : false
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
                                Form::label('start_date', trans('activity.start_date'), ['class' => 'col-md-4 control-label'])
                             }}

                            <div class="col-md-6">
                                {{
                                    Form::text(
                                        'start_date',
                                        isset($activity->start_date) ? $activity->start_date : old('start_date'),
                                        [
                                            'data-validation'        => 'required date',
                                            'data-validation-format' => 'dd/mm/yyyy',
                                            'class'                  => 'form-control',
                                            'id'                     => 'start_date',
                                            'disabled'               => isset($disabled) ? $disabled : false
                                        ]
                                    )

                                }}

                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                            {{
                                Form::label('end_date', trans('activity.end_date'), ['class' => 'col-md-4 control-label'])
                             }}

                            <div class="col-md-6">
                                {{
                                   Form::text(
                                       'end_date',
                                       isset($activity->end_date) ? $activity->end_date : old('end_date'),
                                       [
                                           'data-validation'                  => 'required date',
                                           'data-validation-format'           => 'dd/mm/yyyy',
                                           'data-validation-depends-on'       => 'status_id',
                                           'data-validation-depends-on-value' => 4,
                                           'class'                            => 'form-control',
                                           'id'                               => 'end_date',
                                           'disabled'                         => isset($disabled) ? $disabled : false
                                       ]
                                   )

                                }}
                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                            {{
                                Form::label('status', trans('activity.status'), ['class' => 'col-md-4 control-label'])
                             }}

                            <div class="col-md-6">
                                {{
                                    Form::select(
                                        'status_id',
                                        $status,
                                        isset($activity->status_id) ? $activity->status_id : old('status_id'),
                                        [
                                            'class'           => 'form-control',
                                            'data-validation' => 'required',
                                            'disabled'        => $disabled,
                                            'placeholder'     => trans('activity.placeHolder_select')
                                        ]
                                   )
                                }}
                                @if ($errors->has('status_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('situation') ? ' has-error' : '' }}">
                            {{
                                Form::label('situation', trans('activity.situation'), ['class' => 'col-md-4 control-label'])
                             }}

                            <div class="col-md-6">
                                {{
                                    Form::select(
                                        'situation',
                                        [
                                            0 => trans('activity.disable'),
                                            1 => trans('activity.enable'),
                                        ],
                                        isset($activity->situation) ? $activity->situation : old('situation'),
                                        [
                                            'class'           => 'form-control',
                                            'data-validation' => 'required',
                                            'disabled'        => $disabled,
                                            'placeholder'     => trans('activity.placeHolder_select')
                                        ]
                                   )
                                }}

                                @if ($errors->has('situation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('situation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button  @if (isset($disabled) && $disabled == true) disabled @endif type="submit" class="btn btn-success">
                                    @if(isset($activity))
                                        @lang('activity.editing')
                                    @else
                                        @lang('activity.creating')
                                     @endif
                                </button>
                                {{
                                    link_to_route('home', trans('activity.back'),[] ,['class' => 'btn btn-danger'])
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
    {{ Html::script('js/datetimepicker/new_edit.js') }}

    @include('components.validation')

@endsection