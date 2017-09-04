@extends('layouts.login')

@section('content')

        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset mt-login-5-bsfix">
                    <div class="login-bg" style="background-image:url('assets/pages/img/login/bg1.jpg')">
                        <img class="login-logo" src="{!! asset('assets/pages/img/login/logo.png') !!}" /> </div>
                </div>
                <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                    <div class="login-content">
                        <h1>SISTEMA DE VENTAS</h1>
                        <br><br><br>
                        <p>
                        @if (session('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif
                        </p>
                        {!! Form::open(['class' => 'login-form', 'method' => 'POST', 'route' => 'sesion']) !!}
                            <div class="row">
                                <div class="col-xs-6">
                                {!! Form::text('username',null,['class' => 'form-control form-control-solid placeholder-no-fix form-group', 'placeholder' => 'USUARIO']) !!}
                                </div>
                                <div class="col-xs-6">
                                {!! Form::password('password',['class' => 'form-control form-control-solid placeholder-no-fix form-group', 'placeholder' => 'CONTRASEÑA']) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                </div>
                                <div class="col-sm-8 text-right">
                                {!! Form::submit('INICIAR SESION',['class' => 'btn green']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright &copy <?php echo date('Y'); ?>; Soluciones Informaticas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
@endsection