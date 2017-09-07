@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/pages/css/search.min.css') !!}
@stop

@section('title') PRODUCTO
@stop

@section('titulo') BUSCAR PRODUCTO {!! $producto->get('nombre') !!}
@stop

@section('content')
                    <div class="search-page search-content-4">
                        <div class="search-bar bordered">
                            {!! Form::open(['method' => 'POST','url' => 'buscar-producto']) !!}
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Ingrese nombre del producto..." name="producto">
                                        <span class="input-group-btn">
                                            <button class="btn green-soft uppercase bold" type="submit">BUSCAR</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="search-table table-responsive">
                            <table class="table table-bordered table-striped table-condensed">
                                <thead class="bg-blue">
                                    <tr>
                                        <th>
                                            <a href="javascript:;">CODIGO</a>
                                        </th>
                                        <th>
                                            <a href="javascript:;">NOMBRE</a>
                                        </th>
                                        <th>
                                            <a href="javascript:;">PRECIO VENTA</a>
                                        </th>
                                        <th>
                                            <a href="javascript:;">STOCK</a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($producto as $row)
                                    <tr>
                                        <td class="table-status">
                                            {!! $row->codigo !!}
                                        </td>
                                        <td class="table-date font-blue">
                                            <a href="javascript:;">{!! $row->nombre !!}</a>
                                        </td>
                                        <td class="table-title">
                                            <h3>
                                                <a href="javascript:;">{!! $row->precio_venta !!}</a>
                                            </h3>
                                        </td>
                                        <td class="table-desc"> {!! $row->stock !!} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        </div>
@stop

@section('js-script')
{!! Html::script('assets/global/plugins/jquery-ui/jquery-ui.min.js') !!}
{!! Html::script('assets/pages/scripts/search.min.js') !!}
@stop