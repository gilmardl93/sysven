@extends('layouts.admin')

@section('title') INVENTARIO DE TIENDA @stop
@section('titulo') INVENTARIO DE TIENDA @stop

@section('css-style')
{!! Html::style('assets/global/plugins/select2/css/select2.min.css') !!}
{!! Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}
@stop

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="portlet light bordered">
                <div class="portlet-title">VER INVENTARIO DE TIENDA</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'buscar.inventario']) !!}
                    <div class="row">
                        <div class="col-md-9">
                        {!! Form::select('tienda',$tienda, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-3">
                        {!! Form::submit('BUSCAR', ['class' => 'btn default green-stripe']) !!}
                        </div>
                    </div>            
                {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">REGISTRAR INVENTARIO EN TIENDA</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'agregar.inventario']) !!}
                    <div class="row">
                        <div class="col-md-10">
                        {!! Form::select('producto',[], null, ['id' => 'Producto', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-2">
                        {!! Form::submit('AGREGAR', ['class' => 'btn default green-stripe']) !!}
                        </div>
                    </div>         
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                        <label>SELECCIONE TIENDA</label>
                        {!! Form::select('tienda',$tienda, null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                        {!! Field::text('stock') !!}
                        </div>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop


@section('js-script')
{!! Html::script('assets/global/plugins/select2/js/select2.full.min.js') !!}
<script>
    $.fn.select2.defaults.set("theme", "bootstrap");
    
    $("#Producto").select2({
        width:'auto',
        ajax: {
            url: '{{ url("listado-productos-disponibles-json") }}',
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    varsearch: params.term 
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        placeholder : 'Buscar Producto: ejemplo LIMA',
        minimumInputLength: 1,
        templateResult: producto,
        templateSelection: producto,
        escapeMarkup: function(markup) {
            return markup;
        } 
    });
    function producto(pro){
        var markup = pro.text + " - " + pro.pre + " - " + pro.stock + " UNIDADES";
        return markup;
    }    
</script>
@stop