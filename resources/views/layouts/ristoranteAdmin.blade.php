<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link rel="stylesheet" href="<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">" />

    <!-- Styles -->
    <link href="{{ asset('cssB/now-ui-dashboard.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('partials.navbar')
        <main class="py-4">
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