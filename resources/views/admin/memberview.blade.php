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
    <title>WCS | Member Profile </title>
@endsection


@section('content')

    @include('admin.nav')

<div id="layoutSidenav">

    @include('admin.sideNav')

    <div id="layoutSidenav_content">
        <main>

            <div class="container">
                <h1 class="mt-4 page-heading text-dark">Member</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Member View</li>
                </ol>

                @include('alertMessage')

                <div class="container">
                    <div class="">
                        <ul class="nav justify-content-center mb-4">
                            <li class="nav-item m-2">
                                <a class="nav-link btn btn-info" href="{{url('a/member/pdf/'.$member->id_member)}}" role="button"><i class="far fa-file-pdf"></i> PDF</a>
                            </li>
                            <li class="nav-item m-2">
                                <a class="nav-link btn btn-primary" href="{{url('a/requests/member/'.$member->id_member)}}" role="button">Services</a>
                            </li>
                        </ul>
                        <hr>
                    </div>

                    <div class="col-sm-8 p-5 mx-auto">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-center bg-dark text-white">
                                        <strong> Member Profile </strong>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-light">
                                <tr>
                                    <th class="text-right" scope="row">Name</th>
                                    <td colspan="2"> {{ $member->name_member}} </td>
                                </tr>
                                <tr>
                                    <th class="text-right" scope="row">NID</th>
                                    <td colspan="2"> {{ $member->nid_member}} </td>
                                </tr>
                                <tr>
                                    <th class="text-right" scope="row">Birthdate</th>
                                    <td colspan="2"> {{ $member->birthday_member}} </td>
                                </tr>
                                <tr>
                                    <th class="text-right" scope="row">Age</th>
                                    <td colspan="2"> {{ floor((time() - strtotime($member->bday_member)) / 31556926)}} </td>
                                </tr>
                                <tr>
                                    <th class="text-right" scope="row">Gender</th>
                                <span class="d-none"> {{ ($member->gender_member == 'F') ? $gender = "Female" : $gender = "Male"}}</span>
                                    <td colspan="2"> {{ $gender }} </td>
                                </tr>
                                <tr>
                                    <th class="text-right" scope="row">Phone</th>
                                    <td colspan="2"> {{ $member->phone_member}} </td>
                                </tr>
                                <tr>
                                    <th class="text-right" scope="row">Email</th>
                                    <td colspan="2"> {{ $member->email_member}} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>

        @include('admin.footer')
    </div>
</div>
@endsection

