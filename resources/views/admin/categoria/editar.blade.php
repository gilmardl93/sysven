@extends('layouts.admin')

@section('title') CATEGORIAS
@stop

@section('titulo') CATEGORIAS
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">ACTUALIZAR CATEGORIA</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'categoria.actualizar']) !!}
                @foreach($categoria as $row)
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
