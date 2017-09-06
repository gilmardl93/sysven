@extends('layouts.admin')

@section('title') TIENDAS
@stop

@section('titulo') TIENDAS
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">ACTUALIZAR TIENDA</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'tienda.actualizar']) !!}
                @foreach($tienda as $row)
                <input type="hidden" name="id" value="{!! $row->id !!}">
                {!! Field::text('nombre',$row->nombre,['class' => 'form-control']) !!}
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
