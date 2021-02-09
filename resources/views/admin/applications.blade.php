@extends('layouts.masterDash')

@section('title')
    <title>WCS | Applications</title>
@endsection


@section('content')

    @include('admin.nav')

<div id="layoutSidenav">

    @include('admin.sideNav')

    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <h1 class="mt-4">Applications</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">LAB</li>
                    <li class="breadcrumb-item active">Members</li>
                    <li class="breadcrumb-item active">Applications</li>
                </ol>

                @include('alertMessage')

                <div class="mb-4">
                    @if($status == false)
                        <a href="{{ url('a/applications') }}"><button disabled class="btn btn-primary">Pending</button></a>
                        <a href="{{ url('a/applications/checked') }}"><button class="btn btn-secondary">Checked</button></a>
                    @else
                        <a href="{{ url('a/applications') }}"><button class="btn btn-primary">Pending</button></a>
                        <a href="{{ url('a/applications/checked') }}"><button disabled class="btn btn-secondary">Checked</button></a>
                    @endif

                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        @if ($status == false)
                            All Pending Applications
                        @else
                            All Checked Applications
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Time</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($applications as $application)
                                    <tr>
                                        <td>{{$application['fullName_application']}}</td>
                                        <td>{{$application['phone_application']}}</td>
                                        <td>{{$application['email_application']}}</td>
                                        <td>{{$application['whyInterested_application']}}</td>
                                        <td>{{$application['created_at']}}</td>
                                        <td>
                                            <div class="btn-group">
                                                @if ($application['status_application'] == false)
                                                    <a href="{{ url('a/application/checked/'.$application['id_application']) }}" class="btn btn-primary btn-sm"> Checked </a>
                                                @else
                                                    <a href="{{ url('a/application/uncheck/'.$application['id_application']) }}" class="btn btn-secondary btn-sm"> Uncheck </a>
                                                @endif
                                                <a href="{{ url('a/application/delete/'.$application['id_application']) }}" class="btn btn-danger btn-sm"> Delete </a>
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

