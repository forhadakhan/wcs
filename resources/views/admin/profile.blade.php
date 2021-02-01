@extends('layouts.masterDash')

@section('title')
    <title>WCS | Profile</title>
@endsection


@section('content')

    @include('admin.nav')

<div id="layoutSidenav">

    @include('admin.sideNav')

    <div id="layoutSidenav_content">
        <main>
            @include('alertMessage')
            <div class="container">
                <h1 class="mt-4">Profile</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Profile</li>
                    <li class="breadcrumb-item active">{{ explode(" ", $LoggedAdminInfo->name_admin)[0] }}</li>
                    <li class="breadcrumb-item active">View Profile</li>
                </ol>
            </div>

            <div class="container">
                <form>
                    <hr>
                    <div class="form-group row">
                      <label for="infoo1" class="col-sm-2 col-form-label font-weight-bold">Role</label>
                      <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="infoo1" value="{{ $LoggedAdminInfo->role_admin }}">
                      </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo2" class="col-sm-2 col-form-label font-weight-bold">Name</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="infoo2" value="{{ $LoggedAdminInfo->name_admin }}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo3" class="col-sm-2 col-form-label font-weight-bold">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="infoo3" value="{{ $LoggedAdminInfo->phone_admin }}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo4" class="col-sm-2 col-form-label font-weight-bold">Email</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="infoo4" value="{{ $LoggedAdminInfo->email_admin }}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo5" class="col-sm-2 col-form-label font-weight-bold">Joined</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="infoo5" value="{{ $LoggedAdminInfo->created_at }}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo6" class="col-sm-2 col-form-label font-weight-bold">Last Updated</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="infoo6" value="{{ $LoggedAdminInfo->updated_at }}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo77" class="col-sm-2 col-form-label font-weight-bold"></label>
                        <div class="col-sm-10">
                          <a href="{{url('profile/update')}}" class="mx-auto btn btn-outline-primary">Want to make change?</a>
                        </div>
                    </div>
                    <hr>
                </form>
            </div>
        </main>

        @include('admin.footer')
    </div>
</div>
@endsection

