@extends('layouts.admin')

@section('title') APERTURAR CAJA @stop
@section('titulo') APERTURAR CAJA @stop

@section('content')
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($caja == 0)
    <div class="row">
        <div class="col-md-8"> 
            <div class="portlet light bordered">
                <div class="portlet-title"><b>APERTURAR CAJA</b></div>
                <div class="portlet-body">
                    {!! Form::open(['method' => 'POST', 'url' => 'apertura-caja']) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <label><b>HORA DE APERTURA</b></label>
                            {!! Form::text('producto',date('H:i'), ['id' => 'Producto', 'class' => 'form-control', 'disabled']) !!}              
                        </div>
                        <div class="col-md-4">
                            <label><b>MONTO INICIAL</b></label>
                            {!! Form::text('monto_inicial',0, ['id' => 'Producto', 'class' => 'form-control']) !!}              
                        </div>
                        <div class="col-md-4">
                        <br>
                            {!! Form::submit('APERTURAR CAJA',['class' => 'btn default green-stripe']) !!}              
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-8"> 
            <div class="portlet light bordered">
                <div class="portlet-title"><b>CERRAR CAJA</b></div>
                <div class="portlet-body">
                    {!! Form::open(['method' => 'POST', 'url' => 'cerrar-caja']) !!}
                    <div class="row">
                        <div class="col-md-4">
                            <label><b>HORA DE CIERRE</b></label>
                            {!! Form::text('producto',date('H:i'), ['id' => 'Producto', 'class' => 'form-control', 'disabled']) !!}              
                        </div>
                        <div class="col-md-4">
                        <br>
                            {!! Form::submit('CERRAR CAJA',['class' => 'btn default red-stripe']) !!}              
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @endif
@stop

@section('js-script')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
@stop