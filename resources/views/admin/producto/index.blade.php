@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop


@section('title') PRODUCTOS
@stop

@section('titulo') PRODUCTOS
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
                <div class="portlet-title">LISTA DE PRODUCTOS <a href="{!! url('nuevo-producto') !!}" class="btn btn-warning">NUEVO</a></div>
                <div class="portlet-body">
                <table class="table table-bordered table-hover Productos" >
                    <thead>
                        <tr>
                            <th> Codigo </th>
                            <th> Nombre </th>
                            <th> Marca </th>
                            <th> Presentacion </th>
                            <th> Categoria </th>
                            <th> Precio Compra</th>
                            <th> Precio Venta </th>
                            <th> Fecha de Registro </th>
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
$('.Productos').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "sAjaxSource": '{{ url('listado-productos') }}',
    "pagingType": "bootstrap_full_number",
    "columnDefs": [
                { 
                    'orderable': false,
                    'targets': '_all'
                },
                {
                    'targets':8,
                    'render': function ( data, type, row ) {
                      return ' \
                      <a href="editar-producto/'+row.id+'" title="Editar"class="btn btn-icon-only green-haze" ><i class="fa fa-edit"></i></a> \
                      <a href="eliminar-producto/'+row.id+' " title="Eliminar" class="btn btn-icon-only red" ><i class="fa fa-trash"></i></a> \
                      ';
                    }
                }
            ],
    "columns": [
            { "data": "codigo","defaultContent": "" },
            { "data": "nombre","defaultContent": "" },
            { "data": "marca.nombre","defaultContent": "" },
            { "data": "presentacion.nombre","defaultContent": "" },
            { "data": "categoria.nombre","defaultContent": "" },
            { "data": "precio_compra","defaultContent": "" },
            { "data": "precio_venta","defaultContent": "" },
            { "data": "fecha","defaultContent": "" },

        ]


});
</script>

@stop