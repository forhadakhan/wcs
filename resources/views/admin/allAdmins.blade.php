@extends('layouts.masterDash')

@push('css')
    <link rel="stylesheet" href=" {{ asset('resources/DataTables/datatables.min.css') }}">
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
                <h1 class="mt-4 page-heading text-dark">Staff</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">LAB</li>
                    <li class="breadcrumb-item active">Admins</li>
                    <li class="breadcrumb-item active">All Admins</li>
                </ol>

                @include('alertMessage')

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        List of staff
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Role</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{$admin['role_admin']}}</td>
                                        <td>{{$admin['name_admin']}}</td>
                                        <td>{{$admin['phone_admin']}}</td>
                                        <td>{{$admin['email_admin']}}</td>
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
            $('#dataTable').DataTable();
        } );
    </script>
@endpush
