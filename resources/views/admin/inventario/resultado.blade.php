@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('title') INVENTARIO DE LA TIENDA @stop
@section('titulo') INVENTARIO DE LA TIENDA @stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">TOTAL DE INVENTARIO DE LA TIENDA</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                <table class="table table-striped" id="movimiento">
                    <thead>
                        <tr>
                            <th> Codigo </th>
                            <th> Producto </th>
                            <th> Categoria </th>
                            <th> Marca </th>
                            <th> Presentacion </th>
                            <th> Precio Venta </th>
                            <th> Stock </th>
                            <th> Codigo de Barra </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resultado as $row)
                        <tr>
                            <td> {!! $row->codigo !!} </td>
                            <td> {!! $row->producto !!} </td>
                            <td> {!! $row->categoria !!} </td>
                            <td> {!! $row->marca !!} </td>
                            <td> {!! $row->presentacion !!} </td>
                            <td> {!! $row->precio_venta !!} </td>
                            <td> {!! $row->total !!} </td>
                            <td> {!! DNS1D::getBarcodeHTML($row->codigo, "C128")!!} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">MOVIMIENTO DE INVENTARIO DE TIENDA</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                <table class="table table-striped" id="sample_1">
                    <thead>
                        <tr>
                            <th> Fecha de Registro </th>
                            <th> Codigo </th>
                            <th> Producto </th>
                            <th> Categoria </th>
                            <th> Marca </th>
                            <th> Presentacion </th>
                            <th> Precio Compra </th>
                            <th> Precio Venta </th>
                            <th> Stock </th>
                            <th> Codigo de Barra </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movimiento as $row)
                        <tr>
                            <td> {!! $row->fecha_hora !!} </td>
                            <td> {!! $row->codigo !!} </td>
                            <td> {!! $row->producto !!} </td>
                            <td> {!! $row->categoria !!} </td>
                            <td> {!! $row->marca !!} </td>
                            <td> {!! $row->presentacion !!} </td>
                            <td> {!! $row->precio_compra !!} </td>
                            <td> {!! $row->precio_venta !!} </td>
                            <td> {!! $row->stock !!} </td>
                            <td> {!! DNS1D::getBarcodeHTML($row->codigo, "C128")!!} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js-script')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
{!! Html::script('assets/pages/scripts/table-datatables-buttons.js') !!}
<script>
    $(function(){
        $("#movimiento").dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },

            // Or you can use remote translation file
            "language": {
               url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
            },


            buttons: [
                { extend: 'print', className: 'btn dark btn-outline' },
                { extend: 'pdf', className: 'btn green btn-outline' },
                { extend: 'excel', className: 'btn yellow btn-outline ' },
                { extend: 'colvis', className: 'btn dark btn-outline', text: 'Columns'}
            ],


            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: false,

            //"ordering": false, disable column ordering 
            //"paging": false, disable pagination

            "order": [
                [0, 'asc']
            ],
            
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        });
    });
</script>
@stop