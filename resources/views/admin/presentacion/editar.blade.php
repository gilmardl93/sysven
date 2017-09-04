@extends('layouts.admin')

@section('title') PRESENTACIONES
@stop

@section('titulo') PRESENTACIONES
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">ACTUALIZAR PRESENTACION</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'presentacion.actualizar']) !!}
                @foreach($presentacion as $row)
                <input type="hidden" name="id" value="{!! $row->id !!}">
                {!! Field::text('nombre',$row->nombre,['class' => 'form-control']) !!}
                {!! Form::submit('ACTUALIZAR', ['class' => 'btn default green-stripe']) !!}
                @endforeach
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
