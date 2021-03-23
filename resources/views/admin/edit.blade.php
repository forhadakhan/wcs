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
    <title>WCS | Edit Admins</title>
@endsection


@section('content')

    @include('admin.nav')

    <div id="layoutSidenav">

        @include('admin.sideNav')

        <div id="layoutSidenav_content">
            <main>

                <div class="container">
                    <h1 class="mt-4 page-heading text-dark">Edit Admins</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Admins</li>
                        <li class="breadcrumb-item active">Edit Admins</li>
                    </ol>

                    @include('alertMessage')

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            List of all admins
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
                                                    <a href="{{ url('a/admin/edit/'.$admin->id_admin) }}" data-toggle="tooltip" title="Edit" class="btn btn-primary btn-sm mr-2"><i class="fas fa-edit"></i>  </a>
                                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-trash-alt"></i> </a>
                                                </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog  modal-dialog-centered">
                                                        <div class="modal-content p-5 bg-light">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <strong>{{$admin['name_admin']}}</strong> <br>
                                                                <span>{{$admin['role_admin']}}</span> <br>
                                                                <span>{{$admin['email_admin']}}</span> <br>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                            <a href="{{ url('a/admin/delete/'.$admin->id_admin) }}" type="button" class="btn btn-danger">Yes</a>
                                                            </div>
                                                        </div>
                                                        </div>
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
            $('#dataTable').DataTable();
        } );
    </script>
@endpush
