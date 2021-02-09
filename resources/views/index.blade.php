@extends('layouts.masterFront')

@section('title')
    <title>WCS | Home</title>
@endsection

@section('content')

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">WCS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#page-top">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
                @if(session()->has('LoggedAdmin'))
                    <a class="nav-link js-scroll-trigger" href="{{ url('dashboard') }}"><i class="fa fa-tachometer"> Dashboard </i></a>
                @elseif (session()->has('LoggedMember'))
                    <a class="nav-link js-scroll-trigger" href="{{ url('member') }}"><i class="fa fa-home"> Home </i></a>
                @else
                    <a class="nav-link js-scroll-trigger" href="{{ url('login') }}"><i class="fa fa-sign-in"> Login </i></a>
                @endif
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <header class="text-white bg-grid p20p full-vertical-height">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center h-font">
                    <h1>Waterlily Cooperative Society</h1>
                    <p>We stand together, in need of each other.</p>
                    <a href="{{ url('apply') }}"><button class="btn btn-outline-light" type="button">Become a member</button></a>
                </div>
            </div>
        </div>
    </header>

    <section id="about" class="full-vertical-height">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
            <h2>About WCS</h2>
            <p class="lead">
                <acronym title="Waterlily Cooperative Society">WCS</acronym> is formed to helping Bangladeshi rural peoples. We mainly work with women, and our main target is to make our
                members financially stable. We help our members to build new skills, make savings, sell their goods, and mentorship.
                We also provide funding for business and emergency needs.
            </p>
            </div>
        </div>
        </div>
    </section>

    <section id="services" class="bg-light full-vertical-height">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2>Services We Provide</h2>
                <p class="lead"> Our services are limited to members only. We provide the following services: </p>
                <ul class="lead">
                    <li>Funding for business and emergency needs</li>
                    <li>Any amount savings facility</li>
                    <li>Mentorship</li>
                    <li>Counseling</li>
                    <li>Monthly Raffle Draw</li>
                </ul>
            </div>
        </div>
        </div>
    </section>

    <section id="contact" class="full-vertical-height py-10">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="mb-5">Contact</h2>
                <div class="col-lg-4 mx-auto">

                </div>
                <div class="col-lg-4 mx-auto">
                </div>
                <div class="row m-1">
                    <address class="d-block">
                        <strong>Waterlily Cooperative Society</strong><br>
                        House-03, Road-07, Block-A<br>
                        Gram, Sylhet, Bangladesh<br>
                        <abbr title="Phone"> P:</abbr>
                            +8801234567890
                    </address>
                </div>
                <div class="row my-3 mx-1">
                    <address class="d-block p-20">
                        <strong>Online</strong><br>
                        <a href="http://wcs.test/">www.wcs.test</a> <br>
                        Email: <a href="mailto:#">mail@wcs.test</a>
                    </address>
                </div>
            </div>
        </div>
        </div>
    </section>



@endsection
