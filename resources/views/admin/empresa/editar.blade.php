@extends('layouts.admin')

@section('title') PROVEDORES
@stop

@section('titulo') PROVEDORES
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">ACTUALIZAR PROVEDOR</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'provedor.actualizar']) !!}
                @foreach($provedor as $row)
                <input type="hidden" name="id" value="{!! $row->id !!}">
                <div class="row">
                    <div class="col-md-6">
                    {!! Field::text('razon_social',$row->razon_social,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('ruc',$row->ruc,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('telefono1',$row->telefono1,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('telefono2',$row->telefono2,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('email',$row->email,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('pagina_web',$row->pagina_web,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('direccion',$row->direccion,['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-6">
                    {!! Field::text('distrito',$row->distrito,['class' => 'form-control']) !!}
                    </div>
                </div>
                @endforeach
                {!! Field::submit('ACTUALIZAR', ['class' => 'btn btn-primary']) !!}
                <a href="{!! url('provedor') !!}" class="btn btn-danger">ATRAS</a>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

