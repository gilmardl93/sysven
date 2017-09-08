@extends('layouts.admin')


@section('css-style')
{!! Html::style('assets/global/plugins/select2/css/select2.min.css') !!}
{!! Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}
@stop

@section('content')

                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="row widget-row">
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Compras</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green icon-bulb"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644">{!! $compras !!}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Ventas</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red icon-layers"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">{!! $ventas !!}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Productos</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-purple icon-screen-desktop"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="815">{!! $productos !!}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Clientes</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-blue icon-bar-chart"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="5,071">{!! $clientes !!}</span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->

<div class="portlet light portlet-fit bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class=" icon-layers font-green"></i>
            <span class="caption-subject font-green bold uppercase">SELECCIONE TIPO DE VENTA</span>
        </div>
    </div>
    <div class="portlet-body">
        @if($caja == 1)
        <div class="mt-element-step">
            <div class="row step-no-background">
                <div class="col-md-4 mt-step-col">
                    <div class="mt-step-number font-grey-cascade">1</div>
                    <div class="mt-step-title uppercase font-grey-cascade">BOLETA</div>
                    <div class="mt-step-content font-grey-cascade"><a href="{!! url('boleta') !!}" class="btn default blue-stripe btn-block">CLICK AQUI</a></div>
                </div>
                <div class="col-md-4 mt-step-col error">
                    <div class="mt-step-number bg-white font-grey">2</div>
                    <div class="mt-step-title uppercase font-grey-cascade">FACTURA</div>
                    <div class="mt-step-content font-grey-cascade"><a href="{!! url('factura') !!}" class="btn default red-stripe btn-block">CLICK AQUI</a></div>
                </div>
                <div class="col-md-4 mt-step-col done">
                    <div class="mt-step-number bg-white font-grey">3</div>
                    <div class="mt-step-title uppercase font-grey-cascade">TICKET</div>
                    <div class="mt-step-content font-grey-cascade"><a href="{!! url('ticket') !!}" class="btn default green-stripe btn-block">CLICK AQUI</a></div>
                </div>
            </div>
        </div>
        @else
            <div class="note note-danger">
                <h4 class="block">Para poder realizar ventas debe aperturar Caja</h4>
                <p> <a href="{!! url('aperturar-caja') !!}" class="btn default red-stripe">APERTURAR CAJA</a> </p>
            </div>
        @endif
    </div>
</div>

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
                <table class="table table-striped" id="sample_1">
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
@endsection

@section('js-script')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/global/scripts/datatable.js') !!}
{!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
{!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
{!! Html::script('assets/pages/scripts/table-datatables-buttons.js') !!}
@stop