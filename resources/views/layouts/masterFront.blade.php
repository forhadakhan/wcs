<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    <link rel="stylesheet" href=" {{ asset('resources/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href=" {{ asset('resources/css/f-style.css') }}">

    <!-- Title -->
    @yield('title')
</head>

<body id="page-top" class="h-100">

    @yield('content')

    <footer class="py-2 bg-dark mt-auto">
        <div class="container">
            <p class="m-0 text-center">Copyright &copy; WCS 2021</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('resources/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('resources/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('resources/jquery/jquery.easing.min.js') }}"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('resources/js/script.js') }}"></script>
</body>
</html>
