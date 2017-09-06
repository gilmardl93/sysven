@extends('layouts.admin')

@section('title') CLIENTES
@stop

@section('titulo') CLIENTES
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">ACTUALIZAR CLIENTE</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'cliente.actualizar']) !!}
                @foreach($cliente as $row)
                <input type="hidden" name="id" value="{!! $row->id !!}">
                {!! Field::text('razon_social',$row->razon_social,['class' => 'form-control']) !!}
                {!! Field::text('ruc',$row->ruc,['class' => 'form-control']) !!}
                {!! Field::text('email',$row->email,['class' => 'form-control']) !!}
                {!! Field::text('direccion',$row->direccion,['class' => 'form-control']) !!}
                {!! Field::text('distrito',$row->distrito,['class' => 'form-control']) !!}
                {!! Field::text('telefono',$row->telefono,['class' => 'form-control']) !!}
                {!! Form::submit('ACTUALIZAR', ['class' => 'btn default green-stripe']) !!}
                @endforeach
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
