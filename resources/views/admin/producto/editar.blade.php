@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/select2/css/select2.min.css') !!}
{!! Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}
@endsection

@section('title') PRODUCTOS
@stop

@section('titulo') PRODUCTOS
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">ACTUALIZAR TIPO</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'producto.actualizar']) !!}
                @foreach($producto as $row)
                <input type="hidden" name="id" value="{!! $row->id !!}">
                <div class="row">
                    <div class="col-md-6">
                    {!! Field::text('codigo', $row->codigo, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('nombre', $row->nombre, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('precio_venta', $row->precio_venta, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    <label>Presentacion</label>
                    {!! Form::select('presentacion',presentacion($row->idpresentacion),null,['id' => 'presentacion', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <label>Marca</label>
                    {!! Form::select('marca',marca($row->idmarca),null,['id' => 'marca', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    <label>Categoria</label>
                    {!! Form::select('categoria',categoria($row->idcategoria),null,['id' => 'categoria', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <br>
                {!! Form::submit('ACTUALIZAR', ['class' => 'btn default green-stripe']) !!}
                @endforeach
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
{!! Html::script('assets/global/plugins/select2/js/select2.full.min.js') !!}
<script>
    $.fn.select2.defaults.set("theme", "bootstrap");
    
    $("#presentacion").select2({
        width:'auto',
        ajax: {
            url: '{{ url("listado-presentaciones-json") }}',
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
        placeholder : 'Ingrese nombre: ejemplo PRESENTACION',
        minimumInputLength: 3,
        templateResult: format,
        templateSelection: format,
        escapeMarkup: function(markup) {
            return markup;
        } 
    });
    function format(res1){
        var markup=res1.text;
        return markup;
    }
    
    $("#marca").select2({
        width:'auto',
        ajax: {
            url: '{{ url("listado-marcas-json") }}',
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
        placeholder : 'Ingrese nombre: ejemplo MARCA',
        minimumInputLength: 3,
        templateResult: format,
        templateSelection: format,
        escapeMarkup: function(markup) {
            return markup;
        } 
    });
    function format(res2){
        var markup=res2.text;
        return markup;
    }
    
    $("#categoria").select2({
        width:'auto',
        ajax: {
            url: '{{ url("listado-categorias-json") }}',
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
        placeholder : 'Ingrese nombre: ejemplo CATEGORIA',
        minimumInputLength: 3,
        templateResult: format,
        templateSelection: format,
        escapeMarkup: function(markup) {
            return markup;
        } 
    });
    function format(res3){
        var markup=res3.text;
        return markup;
    }
</script>
@endsection
