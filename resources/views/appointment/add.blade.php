@extends('layouts.app')

@section('content')

    <h3 class="page-title">@lang('global.Appointment-management.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['appointment.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            Add appointment
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('cid', 'Customer ID*', ['class' => 'control-label']) !!}
                    {!! Form::text('cid', old('cid'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('cid'))
                        <p class="help-block">
                            {{ $errors->first('cid') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pid', 'Choose product*', ['class' => 'control-label']) !!}
                    <select class="form-control"  NAME="pid"  id="pid">
                        <OPTION VALUE="0">select product </OPTION>  
                      @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->id}}.{{$product->name}}</option>
                        @endforeach
                        </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('uid', 'Choose coach*', ['class' => 'control-label']) !!}
                    <select class="form-control" NAME="uid"  id="uid" onchange="getoptt(this.value,{{$appointment}},{{$products}})" >
                            <OPTION VALUE="0">select coach </OPTION>  
                          @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->id}}.{{$user->name}}</option>
                            @endforeach
                        </select>

                    {!! Form::label('stime', 'Choose Time *', ['class' => 'control-label']) !!}
                    <select class="form-control" NAME='stime' id='stime'>
                            <OPTION VALUE="0">select time</OPTION>  
                        </select>
                    <script src="{{ asset('js/getoptt.js') }}" ></script>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('note', 'Note(optional)', ['class' => 'control-label']) !!}
                    {!! Form::text('note', " ", ['class' => 'form-control', 'placeholder' => '']) !!}
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@stop

