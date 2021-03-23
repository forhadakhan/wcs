@extends('layouts.masterDash')

@push('css')
    <link rel="stylesheet" href=" {{ asset('resources/DataTables/datatables.min.css') }}">
    <style>
        @font-face {
            font-family: BeautyMountains;
            src: url("{{asset('resources/fonts/BeautyMountains.ttf')}}");
        }
    </style>
@endpush

@section('title')
    <title>WCS | Admins</title>
@endsection


@section('content')

    @include('admin.nav')

    <div id="layoutSidenav">

        @include('admin.sideNav')

        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    <h1 class="mt-4 page-heading text-dark">Admins</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">LAB</li>
                        <li class="breadcrumb-item active">Admins</li>
                        <li class="breadcrumb-item active">All Admins</li>
                    </ol>

                    @include('alertMessage')

                    <div class="mb-4">
                        @if($access == true)
                            <a href="{{ url('a/admins') }}"><button disabled class="btn btn-info">Active</button></a>
                            <a href="{{ url('a/admins/blocked') }}"><button class="btn btn-dark">Blocked</button></a>
                        @else
                            <a href="{{ url('a/admins') }}"><button class="btn btn-info">Active</button></a>
                            <a href="{{ url('a/admins/blocked') }}"><button disabled class="btn btn-dark">Blocked</button></a>
                        @endif
                    </div>

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            @if($access == true)
                                List of active admins
                            @else
                                List of blocked admins
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="adminsTable" width="100%" cellspacing="0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Role</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{$admin['role_admin']}}</td>
                                            <td>{{$admin['name_admin']}}</td>
                                            <td>{{$admin['phone_admin']}}</td>
                                            <td>{{$admin['email_admin']}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('a/admin/view/'.$admin['id_admin']) }}" class="btn btn-info btn-sm disabled"> View </a>
                                                    @if ($admin['access_admin'] == true)
                                                        <a href="{{ url('a/admin/block/'.$admin['id_admin']) }}" class="btn btn-dark btn-sm"> Block </a>
                                                    @else
                                                        <a href="{{ url('a/admin/unblock/'.$admin['id_admin']) }}" class="btn btn-dark btn-sm"> Unblock </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            @include('admin.footer')
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('resources/DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#adminsTable').DataTable();
        } );
    </script>
@endpush
