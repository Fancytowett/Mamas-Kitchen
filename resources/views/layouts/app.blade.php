<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{asset('backend/css/material-dashboard.css')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('backend/demo/demo.css"')}}" rel="stylesheet" />
@stack('css')
</head>
<body>
    <div id="app">
        <div id="wrapper">
            @if(Request::is('admin*'))
                @include('layouts.partial.sidebar')

            @endif
        <div class="main-panel">
            @if(Request::is('admin*'))
            @include('layouts.partial.navbar')
            @endif
            @yield('content')
                @if(Request::is('admin*'))
            @include('layouts.partial.footer')
                  @endif
        </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{asset('backend/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/core/popper.min.js')}}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('backend/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="{{asset('backend/js/plugins/chartist.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('backend/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('backend/js/material-dashboard.min.js')}}" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('backend/demo/demo.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>
     @stack('scripts')
</body>
</html>
