<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    <link rel="stylesheet" href=" {{ asset('resources/css/d-main-styles.css') }}">
    <link rel="stylesheet" href=" {{ asset('resources/css/font-awesome.min.css') }}">
@stack('css')
    <link rel="stylesheet" href=" {{ asset('resources/css/d-style.css') }}">

    <!-- Title -->
@yield('title')
</head>

<body id="" class="sb-nav-fixed">

    @yield('content')


    <!-- JavaScript CDN -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script> --}}


    <!-- JavaScript -->
    <script type="text/javascript" src="{{ asset('resources/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/d/jquery-3.5.1.slim.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/d/all.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('resources/js/d/d-scripts.js') }}"></script>
@stack('js')

</body>
</html>
