@extends('layouts.masterDash')

@section('title')
    <title>WCS | Members</title>
@endsection


@section('content')

    @include('admin.nav')

<div id="layoutSidenav">

    @include('admin.sideNav')

    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <h1 class="mt-4">All Members</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">LAB</li>
                    <li class="breadcrumb-item active">Members</li>
                    <li class="breadcrumb-item active">All Members</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        List of all Members
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Birth Date</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Birth Date</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($members as $member)
                                    <tr>
                                        <td>{{$member['name_member']}}</td>
                                        <td>{{$member['phone_member']}}</td>
                                        <td>{{$member['email_member']}}</td>
                                        <td>{{$member['birthday_member']}}</td>
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

