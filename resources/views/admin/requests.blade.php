@extends('layouts.masterDash')

@push('css')
    <link rel="stylesheet" href=" {{ asset('resources/DataTables/datatables.min.css') }}">
@endpush

@section('title')
    <title>WCS | Service Requests</title>
@endsection


@section('content')

    @include('admin.nav')

<div id="layoutSidenav">

    @include('admin.sideNav')

    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <h1 class="mt-4 page-heading text-dark">Service Requests</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">CORE</li>
                    <li class="breadcrumb-item active">Service Requests</li>
                </ol>

                @include('alertMessage')

                <ul class="nav justify-content-center mb-4">
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-info" href="{{url('a/requests/')}}" role="button">All</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-primary" href="{{url('a/requests/processing')}}" role="button">Processing</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-success" href="{{url('a/requests/accepted')}}" role="button">Accepted</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-danger" href="{{url('a/requests/declined')}}" role="button">Declined</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-warning" href="{{url('a/requests/running')}}" role="button">Running</a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-dark" href="{{url('a/requests/completed')}}" role="button">Completed</a>
                    </li>
                </ul>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        {{$cat}} Service Requests
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead class="bg-dark text-white rounded">
                                    <tr>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Title</th>
                                        <th>Amnount</th>
                                        <th>Dateline</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot class="d-none">
                                    <tr>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Title</th>
                                        <th>Amnount</th>
                                        <th>Dateline</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <span class="d-none">{{$i = 100}}</span>
                                    @foreach ($allRequests as $req)
                                    <tr>
                                        <td>{{$req->category_srt}} ({{$req->sub_category_srst}})</td>
                                        <td>{{$req->status_sr}}</td>
                                        <td>{{$req->title_sr}}</td>
                                        <td>{{$req->amount_sr}}</td>
                                        <td>{{$req->bofore_date_sr}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ url('a/requests/'.$req->id_sr) }}" data-toggle="modal" data-target="{{"#modal".$i}}" class="btn btn-info btn-sm"> <i class="fas fa-eye"></i> </a>
                                                    <!-- Modal -->
                                                    <div class="modal fade " id="{{"modal".$i}}" tabindex="-1" aria-labelledby="{{"#modalLble".$i}}" aria-hidden="true">
                                                        <div class="modal-dialog  modal-dialog-centered">
                                                        <div class="modal-content p-5 bg-light">
                                                            <div class="modal-header bg-white border-success rounded">
                                                                <a href="{{url('a/member/view/'.$req->member_id_sr)}}">
                                                                <h5 class="modal-title" data-toggle="tooltip" title="NID: {{$req->nid_member}}" id="{{"modalLble".$i}}">{{$req->name_member}}</h5></a>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-borderless">
                                                                    <tr>
                                                                        <th class="p-0">Category</th>
                                                                        <th class="p-0 font-weight-normal">{{$req->category_srt}} &ensp; ( {{$req->sub_category_srst}} )</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="p-0">Amount</th>
                                                                        <th class="p-0 font-weight-normal">{{$req->amount_sr}}</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="p-0">Date</th>
                                                                        <th class="p-0 font-weight-normal">{{$req->bofore_date_sr}}</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="p-0">Status</th>
                                                                        <th class="p-0 font-weight-normal">{{$req->status_sr}}</th>
                                                                    </tr>
                                                                </table>
                                                                <hr>
                                                                <h5>{{$req->title_sr}}</h5>
                                                                <p>{{$req->body_sr}}</p>
                                                            </div>
                                                            <div class="modal-footer bg-white border-success rounded">
                                                                <a href="{{ url('a/requests/action/decline/'.$req->id_sr) }}" type="button" class="btn btn-danger">DECLINE</a>
                                                                <a href="{{ url('a/requests/action/accept/'.$req->id_sr) }}" type="button" class="btn btn-success">ACCEPT</a>
                                                                <a href="{{ url('a/requests/action/run/'.$req->id_sr) }}" type="button" class="btn btn-warning">RUN</a>
                                                                <a href="{{ url('a/requests/action/complete/'.$req->id_sr) }}" type="button" class="btn btn-dark">COMPLETED</a>
                                                                <a href="{{ url('a/requests/action/processing/'.$req->id_sr) }}" type="button" class="btn btn-info rounded-circle">P</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="{{"#deleteModal".$i}}"> <i class="fas fa-trash-alt"></i> </a>
                                            </div>
                                                <!-- Modal -->
                                                <div class="modal fade " id="{{"deleteModal".$i}}" tabindex="-1" aria-labelledby="{{"#deleteModalLabel".$i}}" aria-hidden="true">
                                                    <div class="modal-dialog  modal-dialog-centered">
                                                    <div class="modal-content p-5">
                                                        <div class="modal-header bg-light border-danger rounded-lg">
                                                        <h5 class="modal-title text-danger" id="{{"deleteModalLabel".$i}}">Are you sure to delete this request?</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-borderless">
                                                                <tr>
                                                                    <th class="p-0">From</th>
                                                                    <th class="p-0 font-weight-normal">
                                                                        <a href="{{url('a/member/view/'.$req->member_id_sr)}}">
                                                                            <h6 data-toggle="tooltip" title="NID: {{$req->nid_member}}">{{$req->name_member}}</h6></a>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="p-0">Title</th>
                                                                    <th class="p-0 font-weight-normal">{{$req->title_sr}}</th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="p-0">Category</th>
                                                                    <th class="p-0 font-weight-normal">{{$req->category_srt}} ({{$req->sub_category_srst}})</th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="p-0">Amount</th>
                                                                    <th class="p-0 font-weight-normal">{{$req->amount_sr}}</th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="p-0">Date</th>
                                                                    <th class="p-0 font-weight-normal">{{$req->bofore_date_sr}}</th>
                                                                </tr>
                                                                <tr>
                                                                    <th class="p-0">Status</th>
                                                                    <th class="p-0 font-weight-normal">{{$req->status_sr}}</th>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer bg-light border-danger rounded-lg">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                        <a href="{{ url('a/requests/action/delete/'.$req->id_sr) }}" type="button" class="btn btn-danger">Yes</a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                    <span class="d-none">{{$i += 1}}</span>
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


