<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    <style>
        @font-face {
            font-family: BeautyMountains;
            src: url("{{asset('resources/fonts/BeautyMountains.ttf')}}");
        }

    </style>
    <link rel="stylesheet" href=" {{ asset('resources/css/d-main-styles.css') }}">
    <link rel="stylesheet" href=" {{ asset('resources/css/dataTables.bootstrap4.min.css') }}">
    <script src="{{ asset('resources/js/d/all.min.js') }}"></script>
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{ asset('resources/css/d-style.css') }}">

    <!-- Title -->
    @yield('title')
</head>

<body id="" class="sb-nav-fixed">

    @yield('content')


    <!-- JavaScript CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>


    <!-- JavaScript -->
    <script src="{{ asset('resources/js/popper.min.js') }}"></script>
    <script src="{{ asset('resources/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('resources/js/d/d-scripts.js') }}"></script>
    <script src="{{ asset('resources/js/d/jquery-3.5.1.slim.min.js') }}"></script>
    {{-- <script src="{{ asset('resources/js/d/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('resources/js/d/Chart.min.js') }}"></script>
    <script src="{{ asset('resources/js/d/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('resources/js/d/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('resources/js/d/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('resources/js/d/demo/chart-bar-demo.js') }}"></script>
    <script src="{{ asset('resources/js/d/demo/datatables-demo.js') }}"></script>
</body>
</html>
