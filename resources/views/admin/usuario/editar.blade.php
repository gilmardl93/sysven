@extends('layouts.admin')

@section('title') USUARIOS
@stop

@section('titulo') USUARIOS
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">ACTUALIZAR USUARIO</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'marca.actualizar']) !!}
                @foreach($usuario as $row)
                <input type="hidden" name="id" value="{!! $row->id !!}">
                {!! Field::text('username',$row->username) !!}
                {!! Field::password('password') !!}
                {!! Field::text('nombres',$row->nombres) !!}
                {!! Field::text('paterno',$row->paterno) !!}
                {!! Field::text('materno',$row->materno) !!}
                <label>ROL</label>
                {!! Form::select('rol',[], null, ['class' => 'form-control']) !!}
                <br>
                <label>TIENDA</label>
                {!! Form::select('tienda',[] , null, ['class' => 'form-control']) !!}
                <br>
                {!! Form::submit('ACTUALIZAR', ['class' => 'btn default green-stripe']) !!}
                <a href="{!! url('usuario') !!}" class="btn default red-stripe">ATRAS</a>
                @endforeach
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
