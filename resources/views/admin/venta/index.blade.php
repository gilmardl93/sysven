@extends('layouts.admin')

@section('title') VENTAS
@stop

@section('titulo') VENTAS
@stop

@section('content')
<div class="portlet light portlet-fit bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class=" icon-layers font-green"></i>
            <span class="caption-subject font-green bold uppercase">SELECCIONE TIPO DE VENTA</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="mt-element-step">
            <div class="row step-no-background">
                <div class="col-md-4 mt-step-col">
                    <div class="mt-step-number font-grey-cascade">1</div>
                    <div class="mt-step-title uppercase font-grey-cascade">BOLETA</div>
                    <div class="mt-step-content font-grey-cascade"><a href="{!! url('boleta') !!}" class="btn default blue-stripe btn-block">CLICK AQUI</a></div>
                </div>
                <div class="col-md-4 mt-step-col error">
                    <div class="mt-step-number bg-white font-grey">2</div>
                    <div class="mt-step-title uppercase font-grey-cascade">FACTURA</div>
                    <div class="mt-step-content font-grey-cascade"><a href="{!! url('factura') !!}" class="btn default red-stripe btn-block">CLICK AQUI</a></div>
                </div>
                <div class="col-md-4 mt-step-col done">
                    <div class="mt-step-number bg-white font-grey">3</div>
                    <div class="mt-step-title uppercase font-grey-cascade">TICKET</div>
                    <div class="mt-step-content font-grey-cascade"><a href="{!! url('ticket') !!}" class="btn default green-stripe btn-block">CLICK AQUI</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('js-script')

{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}

@stop