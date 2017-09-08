@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/datatables/datatables.min.css') !!}
{!! Html::style('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}
@stop

@section('title') INVENTARIO GENERAL
@stop

@section('titulo') INVENTARIO GENERAL
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">INVENTARIO GENERAL</span>
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
                            <th> Precio Compra </th>
                            <th> Precio Venta </th>
                            <th> Stock </th>
                            <th> Codigo de Barra </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $row)
                        <tr>
                            <td> {!! $row->codigo !!} </td>
                            <td> {!! $row->nombre !!} </td>
                            <td> {!! $row->categoria->nombre !!} </td>
                            <td> {!! $row->marca->nombre !!} </td>
                            <td> {!! $row->presentacion->nombre !!} </td>
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
@stop