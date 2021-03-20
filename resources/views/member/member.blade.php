@extends('layouts.masterDash')

@section('title')
    <title>WCS | Home</title>
@endsection


@section('content')

    @include('member.nav')

<div id="layoutSidenav">

    @include('member.sideNav')

    <div id="layoutSidenav_content">
        <main>

            @include('alertMessage')

            <div class="container">
                <h1 class="mt-4 page-heading text-dark">Home</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">CORE</li>
                    <li class="breadcrumb-item active">Home</li>
                </ol>
                <div class="row">

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h1>0</h1>
                                <span>
                                    Request Panding
                                </span>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h1>0</h1>
                                <span>
                                    Debt
                                </span>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        @include('admin.footer')
    </div>
</div>
@endsection

