@extends('layouts.app')

@section('title')
    @lang('common.control-system')
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
            <div class="panel panel-default">
                <div class="panel-heading">@lang('activity.control_activities')</div>

                <div class="panel-body">
                    @if (session('alert'))
                        <div class="alert alert-{{ session('alert.type') }} alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            {!! session('alert.message') !!}
                        </div>
                    @endif

                    <table cellpadding="3" cellspacing="0" border="0" style="width: 50%; margin: 0 auto 2em auto;">
                        <thead>
                        <tr>
                            <th colspan="2" style="text-align: center">@lang('activity.filter')</th>
                        </tr>
                        <tr>
                            <th>@lang('activity.column')</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="filter_col5" data-column="5">
                            <td>@lang('activity.status')</td>
                            <td align="center">
                                {{
                                    Form::select(
                                        'status_id',
                                        $status,
                                        old('status_id'),
                                        [
                                            'class'           => 'form-control col-sm-8 col-offset-sm-2 column_filter',
                                            'id'              => 'col5_filter',
                                            'placeholder'     => trans('activity.placeHolder_select')
                                        ]
                                   )
                                }}
                            </td>
                        </tr>
                        <tr id="filter_col6" data-column="6">
                            <td>@lang('activity.situation')</td>
                            <td align="center">
                                {{
                                   Form::select(
                                       'situation',
                                        [
                                            0 => trans('activity.disable'),
                                            1 => trans('activity.enable'),
                                        ],
                                       old('situation'),
                                       [
                                           'class'           => 'form-control column_filter',
                                           'id'              => 'col6_filter',
                                           'placeholder'     => trans('activity.placeHolder_select')
                                       ]
                                  )
                               }}

                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th></th>
                            <th>@lang('common.name')</th>
                            <th>@lang('activity.description')</th>
                            <th>@lang('activity.start_date')</th>
                            <th>@lang('activity.end_date')</th>
                            <th>@lang('activity.status')</th>
                            <th>@lang('activity.situation')</th>
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



