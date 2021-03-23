@extends('layouts.masterDash')

@push('css')
    <link rel="stylesheet" href=" {{ asset('resources/DataTables/datatables.min.css') }}">
@endpush

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
                    <h1 class="mt-4 page-heading text-dark">All Members</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">LAB</li>
                        <li class="breadcrumb-item active">Members</li>
                        <li class="breadcrumb-item active">All Members</li>
                    </ol>

                    @include('alertMessage')

                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            List of all Members
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="membersTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Birth Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Birth Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($members as $member)
                                        <tr>
                                            <td>{{$member['name_member']}}</td>
                                            <td>{{$memberTypes[$member['type_member']]}}</td>
                                            <td>{{$member['phone_member']}}</td>
                                            <td>{{$member['email_member']}}</td>
                                            <td>{{$member['birthday_member']}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ url('a/member/view/'.$member['id_member']) }}" data-toggle="tooltip" title="View" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> </a>
                                                    @if ($member['access_member'] == true)
                                                        <a href="{{ url('a/member/block/'.$member['id_member']) }}"data-toggle="tooltip" title="Block" class="btn btn-dark btn-sm"><i class="fas fa-ban"></i> </a>
                                                    @else
                                                        <a href="{{ url('a/member/unblock/'.$member['id_member']) }}"data-toggle="tooltip" title="Unblock" class="btn btn-dark btn-sm"><i class="fas fa-lock-open"></i> </a>
                                                    @endif
                                                    <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-trash-alt"></i> </a>
                                                </div>
                                                    <!-- Modal -->
                                                    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog  modal-dialog-centered">
                                                        <div class="modal-content p-5 bg-light">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this member?</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <strong>{{$member['name_member']}}</strong> <br>
                                                                <span>{{$memberTypes[$member['type_member']]}}</span> <br>
                                                                <span>{{$member['email_member']}}</span> <br>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                            <a href="{{ url('a/member/delete/'.$member['id_member']) }}" type="button" class="btn btn-danger">Yes</a>
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
            $('#membersTable').DataTable();
        } );
    </script>
@endpush
