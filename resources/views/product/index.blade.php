@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.product.title')</h3>
    <p>
        <a href="{{ route('product.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
    </p>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($products) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>

                        <th>@lang('global.products.fields.name')</th>
                        <th>@lang('global.products.fields.duration')</th>
                        <th>@lang('global.products.fields.price')</th>
                        <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($products) > 0)
                        @foreach ($products as $product)
                            <tr data-entry-id="{{ $product->id }}">
                                <td></td>

                                <td>{{ $product->name }}</td>
                                <td>{{ $product->duration }}</td>
                                <td>
                                    {{ $product->price }}
                                </td>
                                <td>
                                    <a href="{{ route('product.edit',[$product->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['product.destroy', $product->id])) !!}
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
