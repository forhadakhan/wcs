@extends('layouts.masterDash')

@section('title')
    <title>WCS | Edit Admins</title>
@endsection


@section('content')

    @include('admin.nav')

<div id="layoutSidenav">

    @include('admin.sideNav')

    <div id="layoutSidenav_content">
        <main>

            @include('alertMessage')

            <div class="container">
                <h1 class="mt-4">Edit Admins</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Admins</li>
                    <li class="breadcrumb-item active">Edit Admins</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        List of all admins
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                                <a href="{{ 'edit/'.$admin->id_admin }}" class="btn btn-primary btn-sm"> Edit </a>
                                                <a href="{{ 'delete/'.$admin->id_admin }}" class="btn btn-danger btn-sm"> Delete </a>
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

