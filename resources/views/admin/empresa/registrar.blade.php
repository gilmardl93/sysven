@extends('layouts.admin')

@section('title') PROVEDORES
@stop

@section('titulo') PROVEDORES
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">REGISTRAR PROVEDOR</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'provedor.registrar']) !!}
                <div class="row">
                    <div class="col-md-6">
                    {!! Field::text('razon_social',['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('ruc',['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('telefono1',['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('telefono2',['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('email',['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('pagina_web',['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('direccion',['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('distrito',['class' => 'form-control']) !!}
                    </div>
                </div>
                {!! Form::submit('REGISTRAR', ['class' => 'btn default green-stripe']) !!}
                <a href="{!! url('provedor') !!}" class="btn btn-danger">ATRAS</a>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

