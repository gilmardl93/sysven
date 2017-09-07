@extends('layouts.admin')

@section('css-style')
{!! Html::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
{!! Html::style('assets/pages/css/profile.min.css') !!}
@stop


@section('title') EMPRESA
@stop

@section('titulo') EMPRESA
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
    @foreach($empresa as $row)
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet bordered">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="empresa.png" class="img-responsive" alt=""> </div>
                        <!-- END SIDEBAR USERPIC -->
                        <!-- SIDEBAR USER TITLE -->
                        <div class="profile-usertitle">
                            <div class="profile-usertitle-name"> {!! $row->razon_social !!} </div>
                            <div class="profile-usertitle-job"> RUC: {!! $row->ruc !!} </div>
                        </div>
                        <!-- END SIDEBAR USER TITLE -->
                        <!-- SIDEBAR MENU -->
                        <div class="profile-usermenu">
                            <ul class="nav">
                                <li>
                                    <a href="#">
                                    <i class="icon-home"></i> {!! $row->direccion !!} </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-settings"></i> {!! $row->distrito !!} </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-info"></i> {!! $row->telefono1 !!} </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-info"></i> {!! $row->telefono2 !!} </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-info"></i> {!! $row->email !!} </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-info"></i> {!! $row->pagina_web !!} </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END MENU -->
                    </div>
                    <!-- END PORTLET MAIN -->
                </div>
                            <!-- END BEGIN PROFILE SIDEBAR -->
                            <!-- BEGIN PROFILE CONTENT -->
                            <div class="profile-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="portlet light bordered">
                                            <div class="portlet-title tabbable-line">
                                                <div class="caption caption-md">
                                                    <i class="icon-globe theme-font hide"></i>
                                                    <span class="caption-subject font-blue-madison bold uppercase">Actualizar Informacion de la Empresa</span>
                                                </div>
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_1" data-toggle="tab">Empresa</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="portlet-body">
                                                <div class="tab-content">
                                                    <!-- PERSONAL INFO TAB -->
                                                    <div class="tab-pane active" id="tab_1_1">
                                                        {!! Form::open(['method' => 'POST', 'route' => 'empresa.actualizar']) !!}
                                                            <input type="hidden" name="id" value="{!! $row->id !!}">
                                                            {!! Field::text('razon_social',$row->razon_social) !!}
                                                            {!! Field::text('ruc',$row->ruc) !!}
                                                            {!! Field::text('direccion',$row->direccion) !!}
                                                            {!! Field::text('distrito',$row->distrito) !!}
                                                            {!! Field::text('telefono1',$row->telefono1) !!}
                                                            {!! Field::text('telefono2',$row->telefono2) !!}
                                                            {!! Field::text('email',$row->email) !!}
                                                            {!! Field::text('pagina_web',$row->pagina_web) !!}
                                                            <div class="margiv-top-10">
                                                            {!! Form::submit('ACTUALIZAR',['class' => 'btn default green-stripe']) !!}
                                                            </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                    <!-- END PERSONAL INFO TAB -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    @endforeach
@endsection

@section('js-script')
{!! Html::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}
{!! Html::script('assets/global/plugins/jquery.sparkline.min.js') !!}
{!! Html::script('assets/pages/scripts/profile.min.js') !!}
@stop
