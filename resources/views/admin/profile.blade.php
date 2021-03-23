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
    <link rel="stylesheet" href=" {{ asset('resources/css/profileCardStyle.css') }}">
    <title>WCS | Profile</title>
@endsection


@section('content')

    @include('admin.nav')

<div id="layoutSidenav">

    @include('admin.sideNav')

    <div id="layoutSidenav_content">
        <main>

            <div class="container">
                <h1 class="mt-4 page-heading text-dark">Profile</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">{{ explode(" ", $LoggedAdminInfo->name_admin)[0] }}</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>

            @include('alertMessage')

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row container d-flex mx-auto justify-content-center ">
                        <div class="col-xl-10 col-md-12">
                            <div class="card user-card-full ">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col-sm-4 bg-c-lite-green user-profile">
                                        <div class="card-block text-center text-white">
                                            <div class="m-b-25"> <img src="https://avatars2.githubusercontent.com/u/34574810?s=400&v=4" class="img-radius" alt="User-Profile-Image"> </div>
                                            <h5 class="f-w-600">{{ $LoggedAdminInfo->name_admin }}</h5>
                                            <p>{{ $LoggedAdminInfo->role_admin }}</p> <br>
                                            {{-- <ul class="social-link list-unstyled m-b-10">
                                                <li><a href="#!"><i class="fab fa-facebook"></i></a></li>
                                                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                            </ul> --}}
                                            <a href="{{url('a/profile/update')}}" class="text-white"><i class=" mdi mdi-square-edit-outline feather fas fa-edit m-t-10 f-16"></i>Edit</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-8 bc-r">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                            <div class="row">
                                                <div class="col-sm-6 pt-4">
                                                    <p class="m-b-10 f-w-600">Email</p>
                                                    <h6 class="text-muted f-w-400">{{ $LoggedAdminInfo->email_admin }}</h6>
                                                </div>
                                                <div class="col-sm-6 pt-4">
                                                    <p class="m-b-10 f-w-600">Phone</p>
                                                    <h6 class="text-muted f-w-400">{{ $LoggedAdminInfo->phone_admin }}</h6>
                                                </div>
                                                <div class="col-sm-6 pt-4">
                                                    <p class="m-b-10 f-w-600">Joined</p>
                                                    <h6 class="text-muted f-w-400">{{ $LoggedAdminInfo->created_at }}</h6>
                                                </div>
                                                <div class="col-sm-6 pt-4">
                                                    <p class="m-b-10 f-w-600">Last Updated</p>
                                                    <h6 class="text-muted f-w-400">{{ $LoggedAdminInfo->updated_at }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

