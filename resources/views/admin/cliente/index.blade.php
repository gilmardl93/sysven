@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop


@section('title') CLIENTES
@stop

@section('titulo') CLIENTES
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
        <div class="col-md-4">
            <div class="portlet light bordered">
                <div class="portlet-title">REGISTRAR CLIENTES</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'cliente.registrar']) !!}
                {!! Field::text('razon_social',['class' => 'form-control']) !!}
                {!! Field::text('ruc',['class' => 'form-control']) !!}
                {!! Field::email('email',['class' => 'form-control']) !!}
                {!! Field::text('direccion',['class' => 'form-control']) !!}
                {!! Field::text('distrito',['class' => 'form-control']) !!}
                {!! Field::text('telefono',['class' => 'form-control']) !!}
                {!! Form::submit('REGISTRAR', ['class' => 'btn default green-stripe']) !!}
                {!! Form::close() !!}
                </div>
            </div> 
        </div>
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">LISTA DE CLIENTES</div>
                <div class="portlet-body">
                <table class="table table-bordered table-hover Clientes" >
                    <thead>
                        <tr>
                            <th> Razon Social o Nombres </th>
                            <th> Ruc o DNI </th>
                            <th> Email </th>
                            <th> Direccion </th>
                            <th> Distrito </th>
                            <th> Telefono </th>
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
$('.Clientes').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "sAjaxSource": '{{ url('listado-clientes') }}',
    "pagingType": "bootstrap_full_number",
    "columnDefs": [
                { 
                    'orderable': false,
                    'targets': '_all'
                },
                {
                    'targets':6,
                    'render': function ( data, type, row ) {
                      return ' \
                      <a href="editar-cliente/'+row.id+'" title="Editar"class="btn btn-icon-only green-haze" ><i class="fa fa-edit"></i></a> \
                      <a href="eliminar-cliente/'+row.id+' " title="Eliminar" class="btn btn-icon-only red" ><i class="fa fa-trash"></i></a> \
                      ';
                    }
                }
            ],
    "columns": [
            { "data": "razon_social","defaultContent": "" },
            { "data": "ruc","defaultContent": "" },
            { "data": "email","defaultContent": "" },
            { "data": "direccion","defaultContent": "" },
            { "data": "distrito","defaultContent": "" },
            { "data": "telefono","defaultContent": "" },
        ]


});
</script>

@stop