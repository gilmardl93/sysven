@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/select2/css/select2.min.css') !!}
{!! Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}
{!! Html::style('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') !!}
{!! Html::style('assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') !!}
@endsection

@section('title') BOLETAS
@stop

@section('titulo') BOLETAS
@stop

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if (session('final'))
        <div class="alert alert-success">
            {{ session('final') }} <a href="{!! url('reporte-boleta') !!}" target="_lblank" class="btn default green-stripe">VER BOLETA</a>
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
                    {!! Form::open(['method' => 'POST', 'url' => 'registrar-producto-venta-boleta']) !!}
                    <div class="row">
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-8">
                                <label><b>BUSCAR PRODUCTO</b></label>
                                {!! Form::select('producto',[], null, ['id' => 'Producto', 'class' => 'form-control']) !!}
                                </div>
                                <div class="col-md-2">
                                <label><b>CANTIDAD</b></label>
                                {!! Form::text('cantidad') !!}                         
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
                        @foreach($venta as $row)
                        <tr>
                            <td> {!! $row->cantidad !!} </td>
                            <td> {!! $row->producto->nombre !!} </td>
                            <td> {!! $row->producto->precio_venta !!}</td>
                            <td> {!! $row->cantidad * $row->producto->precio_venta !!} </td>
                            <td> <a href="eliminar-producto-agregado-boleta/{!! $row->id !!} " title="Eliminar" class="btn btn-icon-only red" ><i class="fa fa-trash"></i></a> </td>
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
                                <span class="widget-thumb-body-stat" data-counter="counterup" data-value="">{!! $monto !!}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    {!! Form::open(['method' => 'POST', 'url' => 'registrar-boleta']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <label><b>OPERACION</b></label>
                            <input type="text" value="001 - <?php echo str_pad($max+1, 6, '0', STR_PAD_LEFT); ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label><b>FECHA</b></label>
                            {!! Form::text('fecha_compra', date('Y-m-d')  ,['disabled' => true])!!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                        <label><b>TIPO DE PAGO</b></label>
                        {!! Form::select('pago',$pago, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label><b>BUSCAR CLIENTE</b></label>
                            {!! Form::select('provedor',[], null, ['id' => 'Clientes', 'class' => 'form-control']) !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::submit('REGISTRAR COMPRA',['class' => 'btn default green-stripe']) !!}
                            <a href="{!! url('cliente') !!}" class="btn default yellow-stripe">NUEVO CLIENTE</a>
                            <a href="{!! url('venta') !!}" class="btn default red-stripe">ATRAS</a>
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
        var markup = pro.text + " - " + pro.pre ;
        return markup;
    }

    
    $("#Clientes").select2({
        width:'auto',
        ajax: {
            url: '{{ url("listado-clientes-json") }}',
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
        templateResult: cliente,
        templateSelection: cliente,
        escapeMarkup: function(markup) {
            return markup;
        } 
    });
    function cliente(pro){
        var markup = pro.text + " - " + pro.ruc;
        return markup;
    }
</script>

@stop