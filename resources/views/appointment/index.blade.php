@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.appointment.title')</h3>
    <p>
        <a href="{{ route('appointment.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($appointments) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        <th>id</th>
                        <th>custom name</th>
                        <th>coach</th>
                        <th>price</th>
                        <th>start time</th>
                        <th>note</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($appointments) > 0)
                        @foreach ($appointments as $appointment)
                            <tr data-entry-id="{{ $appointment->id }}">
                                <td></td>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->cName }}</td>
                                <td>{{ $appointment->uName }}</td>
                                <td>{{ $appointment->price }}</td>
                                <td>
                                    {{ $appointment->stime }}
                                </td>
                                <td>{{ $appointment->note }}</td>
                                <td>
                                    <a href="{{ route('appointment.edit',[$appointment->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['appointment.destroy', $appointment->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="9">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>

    </script>
@endsection
