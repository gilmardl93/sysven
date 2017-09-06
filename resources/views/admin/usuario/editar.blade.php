@extends('layouts.admin')

@section('title') MARCAS
@stop

@section('titulo') MARCAS
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">ACTUALIZAR MARCA</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'marca.actualizar']) !!}
                @foreach($marca as $row)
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
