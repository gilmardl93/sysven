<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>@yield('title','Bienvenido')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Sistema de Ventas" name="description" />
        <meta content="Gilmar Marquez Moreno Mejia" name="author" />
        <!-- BEGIN LAYOUT FIRST STYLES -->
        <link href="//fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
        <!-- END LAYOUT FIRST STYLES -->
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        @include('layouts.partials.css.global')
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        @include('layouts.partials.css.page')

        @yield('css-style')
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        @include('layouts.partials.css.global-style')
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        @include('layouts.partials.css.page-global')
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="">
        <!-- BEGIN HEADER -->
        <header class="page-header">
            <nav class="navbar" role="navigation">
                <div class="container-fluid">
                    <div class="havbar-header">
                        <!-- BEGIN LOGO -->
                        <a id="index" class="navbar-brand" href="start.html">
                            <img src="{!! asset('assets/layouts/layout6/img/logo.png') !!}" alt="Logo"> </a>
                        <!-- END LOGO -->
                        <!-- BEGIN TOPBAR ACTIONS -->
                        <div class="topbar-actions">
                            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                            @include('layouts.partials.page.search')
                            <!-- END HEADER SEARCH BOX -->
                            <!-- BEGIN GROUP NOTIFICATION -->
                            <!-- @include('layouts.partials.page.notificacion') -->
                            <!-- END GROUP NOTIFICATION -->
                            <!-- BEGIN USER PROFILE -->
                            @include('layouts.partials.page.user')
                            <!-- END USER PROFILE -->
                        </div>
                        <!-- END TOPBAR ACTIONS -->
                    </div>
                </div>
                <!--/container-->
            </nav>
        </header>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="container-fluid">
            <div class="page-content page-content-popup">

                @include('layouts.partials.page.titulo')

                @include('layouts.partials.page.sidebar')

                <div class="page-fixed-main-content">
                
                @yield('content')

                </div>
                <!-- BEGIN FOOTER -->
                @include('layouts.partials.page.footer')
                <!-- END FOOTER -->
            </div>
        </div>
        <!-- END CONTAINER -->
        
        <!-- BEGIN CORE PLUGINS -->
        @include('layouts.partials.js.core')
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        @include('layouts.partials.js.page')
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {!! Html::script('assets/global/scripts/app.min.js') !!}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        {!! Html::script('assets/pages/scripts/dashboard.min.js') !!}
        @yield('js-script')
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        @include('layouts.partials.js.page-global')
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>