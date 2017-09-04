@extends('layouts.admin')

@section('title') PAGOS
@stop

@section('titulo') PAGOS
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="portlet light bordered">
                <div class="portlet-title">ACTUALIZAR PAGO</div>
                <div class="portlet-body">
                {!! Form::open(['method' => 'POST', 'route' => 'pago.actualizar']) !!}
                @foreach($pago as $row)
                <input type="hidden" name="id" value="{!! $row->id !!}">
                {!! Field::text('nombre',$row->nombre,['class' => 'form-control']) !!}
                {!! Form::submit('ACTUALIZAR', ['class' => 'btn defult green-stripe']) !!}
                @endforeach
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
