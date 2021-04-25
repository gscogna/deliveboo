<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('cssB/now-ui-dashboard.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <main>
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
</body>
    <script src="{{ asset('jsB/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('jsB/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('jsB/core/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('jsB/plugins/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>

    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('jsB/now-ui-dashboard.js')}}" type="text/javascript"></script>
</html>