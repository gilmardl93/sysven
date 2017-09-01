@extends('layouts.admin')

@section('title') TIPOS
@stop

@section('titulo') TIPOS
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">ACTUALIZAR TIPO</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'tipo.actualizar']) !!}
                @foreach($tipo as $row)
                <input type="hidden" name="id" value="{!! $row->id !!}">
                {!! Field::text('nombre',$row->nombre,['class' => 'form-control']) !!}
                {!! Field::submit('ACTUALIZAR', ['class' => 'btn btn-primary']) !!}
                @endforeach
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
