@extends('layouts.admin')

@section('title') VENTAS ANULAR
@stop

@section('titulo') VENTAS ANULAR
@stop

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session('eliminar'))
        <div class="alert alert-danger">
            {{ session('eliminar') }}
        </div>
    @endif

    <div class="portlet light portlet-fit bordered">
        <div class="portlet-title">
            <div class="caption">
                <i class=" icon-layers font-red"></i>
                <span class="caption-subject font-red bold uppercase">ANULAR FACTURA</span>
            </div>
        </div>
        <div class="portlet-body">
            {!! Form::open(['method' => 'POST', 'url' => 'factura-anulada']) !!}
            {!! Field::text('numero') !!}
            {!! Field::textarea('motivo') !!}
            {!! Form::submit('ANULAR', ['class' => 'btn default red-stripe']) !!}
            <a href="{!! url('anular') !!}" class="btn default red-stripe">ATRAS</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop


@section('js-script')

{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}

@stop