@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop


@section('title') USUARIOS
@stop

@section('titulo') USUARIOS
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
                <div class="portlet-title">REGISTRAR USUARIO</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'usuario.registrar']) !!}
                {!! Field::text('username') !!}
                {!! Field::password('password') !!}
                {!! Field::text('nombres') !!}
                {!! Field::text('paterno') !!}
                {!! Field::text('materno') !!}
                <label>ROL</label>
                {!! Form::select('rol',$rol, null, ['class' => 'form-control']) !!}
                <br>
                <label>TIENDA</label>
                {!! Form::select('tienda', $tienda, null, ['class' => 'form-control']) !!}
                <br>
                {!! Form::submit('REGISTRAR', ['class' => 'btn default green-stripe']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">LISTA DE USUARIOS</div>
                <div class="portlet-body">
                <table class="table table-bordered table-hover Marcas" >
                    <thead>
                        <tr>
                            <th> Usuario </th>
                            <th> Tienda </th>
                            <th> Rol </th>
                            <th> Persona </th>
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
$('.Marcas').dataTable({
    "language": {
        "emptyTable": "No hay datos disponibles",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ filas",
        "search": "Buscar :",
        "lengthMenu": "_MENU_ registros"
    },
    "bProcessing": true,
    "sAjaxSource": '{{ url('listado-usuarios') }}',
    "pagingType": "bootstrap_full_number",
    "columnDefs": [
                { 
                    'orderable': false,
                    'targets': '_all'
                },
                {
                    'targets':3,
                    'render': function ( data, type, row ) {
                      return row.paterno+' '+row.materno+' '+row.nombres;
                    }
                },
                {
                    'targets':4,
                    'render': function ( data, type, row ) {
                      return ' \
                      <a href="editar-usuario/'+row.id+'" title="Editar"class="btn btn-icon-only green-haze" ><i class="fa fa-edit"></i></a> \
                      <a href="eliminar-usuario/'+row.id+' " title="Eliminar" class="btn btn-icon-only red" ><i class="fa fa-trash"></i></a> \
                      ';
                    }
                }
            ],
    "columns": [
            { "data": "username","defaultContent": "" },
            { "data": "tienda.nombre","defaultContent": "" },
            { "data": "rol.nombre","defaultContent": "" },

        ]

});
</script>

@stop