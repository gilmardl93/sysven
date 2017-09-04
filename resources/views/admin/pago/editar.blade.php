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
                {!! Form::model($pago,['method' => 'POST', 'route' => 'pago.actualizar']) !!}
                <input type="hidden" name="id" value="{!! $row->id !!}">
                {!! Field::text('nombre',$row->nombre,['class' => 'form-control']) !!}
                {!! Field::submit('ACTUALIZAR', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
