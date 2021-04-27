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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet"> 
    <link href="{{ asset('cssB/now-ui-dashboard.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body style="font-family: 'Poppins', sans-serif;">
    <div id="app">
        <main>
            @yield('content')
        </main>
    </div>
</body>
    <script src="{{ asset('jsB/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('jsB/core/popper.min.js')}}" type="text/javascript"></script>
    {{-- <script src="{{ asset('jsB/core/bootstrap.min.js')}}" type="text/javascript"></script> --}}
    <script src="{{ asset('jsB/plugins/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>

    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('jsB/now-ui-dashboard.js')}}" type="text/javascript"></script>
</html>