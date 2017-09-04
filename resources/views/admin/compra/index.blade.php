@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop


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
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">LISTA DE COMPRAS <a href="{!! url('nueva-compra') !!}" class="btn btn-warning">NUEVO</a></div>
                <div class="portlet-body">
                <table class="table table-bordered table-hover Compras" >
                    <thead>
                        <tr>
                            <th> Producto </th>
                            <th> Cantidad </th>
                            <th> Tipo Documento </th>
                            <th> Tipo Pago </th>
                            <th> Serie </th>
                            <th> Numero </th>
                            <th> Precio Unitario </th>
                            <th> Importe General </th>
                            <th> Fecha Compra </th>
                            <th> Accion </th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')

{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}

<script>
$('.Compras').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "sAjaxSource": '{{ url('listado-compras') }}',
    "pagingType": "bootstrap_full_number",
    "columnDefs": [
                { 
                    'orderable': false,
                    'targets': '_all'
                },
                {
                    'targets':9,
                    'render': function ( data, type, row ) {
                      return ' \
                      <a href="eliminar-compra/'+row.id * row.id+' " title="Eliminar" class="btn btn-icon-only red" ><i class="fa fa-trash"></i></a> \
                      ';
                    }
                }
            ],
    "columns": [
            { "data": "producto.nombre","defaultContent": "" },
            { "data": "cantidad","defaultContent": "" },
            { "data": "tipo.nombre","defaultContent": "" },
            { "data": "pago.nombre","defaultContent": "" },
            { "data": "serie","defaultContent": "" },
            { "data": "numero","defaultContent": "" },
            { "data": "precio_unitario","defaultContent": "" },
            { "data": "precio_unitario * cantidad","defaultContent": "" },
            { "data": "fecha","defaultContent": "" },

        ]


});
</script>

@stop