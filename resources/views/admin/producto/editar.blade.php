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
                {!! Form::open(['method' => 'POST', 'route' => 'tipo.actualizar']) !!}
                @foreach($producto as $row)
                <input type="hidden" name="id" value="{!! $row->id !!}">
                <div class="row">
                    <div class="col-md-6">
                    {!! Field::text('codigo',$row->codigo,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('nombre',$row->nombre,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('precio_venta',$row->precio_venta,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('stock',$row->stock,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::select('presentacion',[],null,['id' => 'presentacion', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::select('marca',[],null,['id' => 'marca', 'class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Form::select('categoria',[],null,['id' => 'categoria', 'class' => 'form-control']) !!}
                    </div>
                </div>
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
        placeholder : 'Ingrese nombre: ejemplo LIMA',
        minimumInputLength: 3,
        templateResult: format,
        templateSelection: format,
        escapeMarkup: function(markup) {
            return markup;
        } 
    });
    function format(res){
        var markup=res.text;
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
        placeholder : 'Ingrese nombre: ejemplo LIMA',
        minimumInputLength: 3,
        templateResult: format,
        templateSelection: format,
        escapeMarkup: function(markup) {
            return markup;
        } 
    });
    function format(res){
        var markup=res.text;
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
        placeholder : 'Ingrese nombre: ejemplo LIMA',
        minimumInputLength: 3,
        templateResult: format,
        templateSelection: format,
        escapeMarkup: function(markup) {
            return markup;
        } 
    });
    function format(res){
        var markup=res.text;
        return markup;
    }
</script>
@endsection
