@extends('layouts.masterDash')

@push('css')
    <style>
        @font-face {
            font-family: BeautyMountains;
            src: url("{{asset('resources/fonts/BeautyMountains.ttf')}}");
        }
    </style>
@endpush

@section('title')
    <title>WCS | Services</title>
@endsection


@section('content')

    @include('member.nav')

<div id="layoutSidenav">

    @include('member.sideNav')

    <div id="layoutSidenav_content">
        <main>

            <div class="container">
                <h1 class="mt-4 page-heading text-dark">Services</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">CORE</li>
                    <li class="breadcrumb-item active">Services</li>
                </ol>
                <div class="">@include('alertMessage')</div>
            </div>


            <div class="container">
                <h5 class="font-weight-light">Request New Service</h5>
                <hr>
                <div class="mb-5">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <h1 class="d-inline"><i class="fas fa-landmark"></i></h1>
                                    <h5 class="d-inline text-right"> Financial </h5>
                                    <span>
                                        <strong class="text-right"></strong>
                                    </span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#" data-toggle="modal" data-target="#serviceModal_1">Loan/Funding/Emergency Needs</a>
                                </div>
                                @include('modals.financialRequestModal')
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <h1 class="d-inline"><i class="fas fa-money-bill-wave"></i></h1>
                                    <h5 class="d-inline text-right"> Savings</h5>
                                    <span>
                                        <strong class="text-right"></strong>
                                    </span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">Save any amount</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <h1 class="d-inline"><i class="fas fa-life-ring"></i></h1>
                                    <h5 class="d-inline text-right"> Mentorship</h5>
                                    <span>
                                        <strong class="text-right"></strong>
                                    </span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">Get a mentor</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body">
                                    <h1 class="d-inline"><i class="fab fa-hire-a-helper"></i></h1>
                                    <h5 class="d-inline text-right"> Counseling</h5>
                                    <span>
                                        <strong class="text-right"></strong>
                                    </span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">Find help for any problem</a>
                                </div>
                            </div>
                        </div>

                    </div>
                      <!-- /.row -->
                </div>


                <h5 class="font-weight-light">Service Records</h5>
                <hr>
                <div class="mb-5">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-dark text-white mb-4">
                                <div class="card-body">
                                    <h1 class="d-inline"><i class="fas fa-landmark"></i></h1>
                                    <h5 class="d-inline text-right"> Financial</h5>
                                    <span>
                                        <strong class="text-right"></strong>
                                    </span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#" data-toggle="modal" data-target="#serviceModal_11">Financial service records</a>
                                </div>
                                @include('modals.financialHistoryModal')
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-dark text-white mb-4">
                                <div class="card-body">
                                    <h1 class="d-inline"><i class="fas fa-money-bill-wave"></i></h1>
                                    <h5 class="d-inline text-right"> Savings</h5>
                                    <span>
                                        <strong class="text-right"></strong>
                                    </span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">Saving records</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-dark text-white mb-4">
                                <div class="card-body">
                                    <h1 class="d-inline"><i class="fas fa-life-ring"></i></h1>
                                    <h5 class="d-inline text-right"> Mentorship</h5>
                                    <span>
                                        <strong class="text-right"></strong>
                                    </span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">Mentorship history</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-dark text-white mb-4">
                                <div class="card-body">
                                    <h1 class="d-inline"><i class="fab fa-hire-a-helper"></i></h1>
                                    <h5 class="d-inline text-right"> Counseling</h5>
                                    <span>
                                        <strong class="text-right"></strong>
                                    </span>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">Counseling history</a>
                                </div>
                            </div>
                        </div>

                    </div>
                      <!-- /.row -->
                </div>
            </div>



        </main>

        @include('admin.footer')
    </div>
</div>
@endsection

