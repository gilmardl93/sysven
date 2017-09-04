@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop


@section('title') PROVEDORES
@stop

@section('titulo') PROVEDORES
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
                <div class="portlet-title">LISTA DE PROVEDORES <a href="{!! url('nuevo-provedor') !!}" class="btn btn-warning">NUEVO</a></div>
                <div class="portlet-body">
                <table class="table table-bordered table-hover Provedores" >
                    <thead>
                        <tr>
                            <th> Razon Social </th>
                            <th> Ruc </th>
                            <th> Telefono 1 </th>
                            <th> Telefono 2 </th>
                            <th> Email </th>
                            <th> Pagina Web </th>
                            <th> Direccion</th>
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
$('.Provedores').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "sAjaxSource": '{{ url('listado-provedores') }}',
    "pagingType": "bootstrap_full_number",
    "columnDefs": [
                { 
                    'orderable': false,
                    'targets': '_all'
                },
                {
                    'targets':7,
                    'render': function ( data, type, row ) {
                      return ' \
                      <a href="editar-provedor/'+row.id+'" title="Editar"class="btn btn-icon-only green-haze" ><i class="fa fa-edit"></i></a> \
                      <a href="eliminar-provedor/'+row.id+' " title="Eliminar" class="btn btn-icon-only red" ><i class="fa fa-trash"></i></a> \
                      ';
                    }
                }
            ],
    "columns": [
            { "data": "razon_social","defaultContent": "" },
            { "data": "ruc","defaultContent": "" },
            { "data": "telefono1","defaultContent": "" },
            { "data": "telefono2","defaultContent": "" },
            { "data": "email","defaultContent": "" },
            { "data": "pagina_web","defaultContent": "" },
            { "data": "direccion","defaultContent": "" },

        ]


});
</script>

@stop