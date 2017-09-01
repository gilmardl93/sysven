<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>SysVen</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Sistema de Ventas" name="description" />
        <meta content="Gilmar Moreno Mejia" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        @include('layouts.partials.css.global')
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        @include('layouts.partials.css.global-style')
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        {!! Html::style('assets/pages/css/login-5.min.css') !!}
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        @yield('content')
        </div>
        <!-- BEGIN CORE PLUGINS -->
        @include('layouts.partials.js.core')
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {!! Html::script('assets/global/scripts/app.min.js') !!}
        <!-- END THEME GLOBAL SCRIPTS -->
    </body>

</html>