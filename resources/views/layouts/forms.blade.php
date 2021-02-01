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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

    <!-- Title -->
    @yield('title')
</head>

<body id="page-top" class="d-flex flex-column min-vh-100 bg-grid">


    @yield('content')

    <footer class="py-2 bg-dark mt-auto">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted"><a class="navbar-brand js-scroll-trigger text-white" href="/">WCS</a></div>
                <div>
                    <p class="pt-50 align-middle">Copyright &copy; WCS 2021</p>
                </div>
            </div>
        </div>

        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Custom JavaScript -->
    <script src="{{ asset('resources/js/script.js') }}"></script>
</body>
</html>
