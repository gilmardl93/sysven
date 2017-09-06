@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/select2/css/select2.min.css') !!}
{!! Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}
{!! Html::style('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') !!}
{!! Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
@endsection

@section('title') COMPRAS
@stop

@section('titulo') COMPRAS
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

    <div class="row">
        <div class="col-md-8"> 
            <div class="portlet light bordered">
                <div class="portlet-title"><b>AGREGAR PRODUCTO</b></div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'url' => 'agregar-producto-compra']) !!} 
                <div class="row">
                    <div class="col-md-10">
                        {!! Form::select('producto',[], null, ['id' => 'Producto', 'class' => 'form-control']) !!}
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                            <label>CANTIDAD</label>
                            {!! Form::text('cantidad', null, ['id' => 'cantidad','onkeyup' => 'ActualizarImporte();']) !!}
                            </div>
                            <div class="col-md-4">
                            <label>PRECIO UNITARIO</label>
                            {!! Form::text('precio_unitario',null, ['id' => 'precio','onkeyup' => 'ActualizarImporte();']) !!}                            
                            </div>
                            <div class="col-md-4">
                                <div id="importe"></div>
                            </div>
                        </div>                    
                    </div>
                    <div class="col-md-2">
                    {!! Form::submit('AGREGAR', ['class' => 'btn default green-stripe']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
                </div>
            </div>

            <div class="portlet light bordered">
                <div class="portlet-title"><b>PRODUCTOS AGREGADOS</b></div>
                <div class="portlet-body">
                <table class="table table-bordered table-hover Productos-agregados" >
                    <thead>
                        <tr>
                            <th> Cantidad </th>
                            <th> Producto </th>
                            <th> Precio Unitario</th>
                            <th> Importe </th>
                            <th> Accion </th>
                        </tr>
                    </thead>
                        @foreach($compra as $row)
                        <tr>
                            <td> {!! $row->cantidad !!} </td>
                            <td> {!! $row->producto->nombre !!} </td>
                            <td> {!! $row->precio_unitario !!}</td>
                            <td> {!! $row->cantidad * $row->precio_unitario !!} </td>
                            <td> <a href="eliminar-producto-agregado/{!! $row->id !!} " title="Eliminar" class="btn btn-icon-only red" ><i class="fa fa-trash"></i></a> </td>
                        </tr>
                        @endforeach
                    <tbody>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                        <h4 class="widget-thumb-heading">TOTAL A PAGAR</h4>
                        <div class="widget-thumb-wrap">
                            <i class="widget-thumb-icon bg-green icon-bulb"></i>
                            <div class="widget-thumb-body">
                                <span class="widget-thumb-subtitle">S/. </span>
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="">{!! $importe !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    {!! Form::open(['method' => 'POST', 'route' => 'compra.registrar']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <label><b>TIPO DE DOCUMENTO</b></label>
                            {!! Form::select('documento',$tipo , null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <label><b>TIPO DE PAGO</b></label>
                            {!! Form::select('pago',$pago , null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('serie') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('numero') !!}
                        </div>
                        <div class="col-md-6">
                            <label ><b>FECHA DE COMPRA</b></label>
                            <input class="form-control form-control-inline input-medium date-picker" size="16" type="text" name="fecha" >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label><b>BUSCAR PROVEDOR</b></label>
                            {!! Form::select('provedor',[], null, ['id' => 'Provedor', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit('REGISTRAR COMPRA',['class' => 'btn default green-stripe']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@stop

@section('js-script')
{!! Html::script('assets/global/plugins/select2/js/select2.full.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') !!}
{!! Html::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}
<script>


    $('.date-picker').datepicker({
        rtl: App.isRTL(),
        orientation: "left",
        autoclose: true
    });

    function ActualizarImporte()
    {
        var precio = document.getElementById("precio").value;
        var cantidad = document.getElementById("cantidad").value;
        var suma = parseFloat(precio) * parseInt(cantidad);
        document.getElementById("importe").innerHTML = "<h2>Importe: "+ suma +"</h2>";
    }


    $.fn.select2.defaults.set("theme", "bootstrap");
    
    $("#Producto").select2({
        width:'auto',
        ajax: {
            url: '{{ url("listado-productos-json") }}',
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
        var markup = pro.text + " - " + pro.pre;
        return markup;
    }

    $("#Provedor").select2({
        width:'auto',
        ajax: {
            url: '{{ url("listado-provedores-json") }}',
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
        placeholder : 'Buscar Provedor: ejemplo LIMA',
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

@stop