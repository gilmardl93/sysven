@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop


@section('title') TIPOS
@stop

@section('titulo') TIPOS
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
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">REGISTRAR TIPO</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'tipo.registrar']) !!}
                {!! Field::text('nombre',['class' => 'form-control']) !!}
                {!! Form::submit('REGISTRAR', ['class' => 'btn default green-stripe']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="portlet light bordered">
                <div class="portlet-title">LISTA DE TIPOS</div>
                <div class="portlet-body">
                <table class="table table-bordered table-hover Tipos" >
                    <thead>
                        <tr>
                            <th> Nombre </th>
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
$('.Tipos').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "sAjaxSource": '{{ url('listado-tipos') }}',
    "pagingType": "bootstrap_full_number",
    "columnDefs": [
                { 
                    'orderable': false,
                    'targets': '_all'
                },
                {
                    'targets':1,
                    'render': function ( data, type, row ) {
                      return ' \
                      <a href="editar-tipo/'+row.id+'" title="Editar"class="btn btn-icon-only green-haze" ><i class="fa fa-edit"></i></a> \
                      <a href="eliminar-tipo/'+row.id+' " title="Eliminar" class="btn btn-icon-only red" ><i class="fa fa-trash"></i></a> \
                      ';
                    }
                }
            ],
    "columns": [
            { "data": "nombre","defaultContent": "" },

        ]


});
</script>

@stop