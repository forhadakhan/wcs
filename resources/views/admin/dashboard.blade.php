@extends('layouts.masterDash')

@section('title')
    <title>WCS | Dashboard</title>
@endsection


@section('content')

    @include('admin.nav')

<div id="layoutSidenav">

    @include('admin.sideNav')

    <div id="layoutSidenav_content">
        <main>

            @include('alertMessage')

            <div class="container">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">CORE</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">
                                <h1>{{DB::table('applications_tbl')->count()}}</h1>
                                <span>
                                    Pending Applications
                                </span>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{url('applications')}}">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">
                                <h1>0</h1>
                                <span>
                                    Active Members
                                </span>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">
                                <h1>0</h1>
                                <span>
                                    <strong>BDT</strong> Loans
                                </span>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-dark text-white mb-4">
                            <div class="card-body">
                                <h1>{{DB::table('admins_tbl')->count()}}</h1>
                                <span>
                                    Active Admins
                                </span>
                            </div>
                            <div class="card-footer text-black d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="{{url('admins')}}">View Details</a>
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

