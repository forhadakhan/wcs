@extends('layouts.masterDash')

@section('title')
    <title>WCS | Update Profile</title>
@endsection


@section('content')

    @include('admin.nav')

<div id="layoutSidenav">

    @include('admin.sideNav')

    <div id="layoutSidenav_content">
        <main>

            <div class="container">
                <h1 class="mt-4">Update Profile</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Profile</li>
                    <li class="breadcrumb-item active">{{ explode(" ", $LoggedAdminInfo->name_admin)[0] }}</li>
                    <li class="breadcrumb-item active">Update Profile</li>
                </ol>
            </div>

            <div class="container">
                <form action="{{ route('auth.admin.updateAdmin') }}" method="POST">
                    @csrf

                    @include('alertMessage')

                    <input class="d-none" name="id" type="hidden" value="{{ $LoggedAdminInfo->id_admin }}">

                    <hr>
                    <div class="form-group row">
                      <label for="infoo1" class="col-sm-2 col-form-label font-weight-bold text-right">Role</label>
                        <div class="col-sm-10">
                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="role">
                                @if ($LoggedAdminInfo->role_admin == 'SUPER_ADMIN')
                                    <option value="ADMIN">ADMIN</option>
                                    <option selected value="SUPER_ADMIN">SUPER ADMIN</option>
                                @else
                                    <option selected value="ADMIN">ADMIN</option>
                                    <option value="SUPER_ADMIN">SUPER ADMIN</option>
                                @endif
                            </select>
                            @if($errors->has('role'))
                                <div class="alert alert-warning" role="alert">
                                    @error('role'){{$message}}@enderror
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo2" class="col-sm-2 col-form-label font-weight-bold text-right">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="infoo2" name="fullName" value="{{ old('fullName')? old('fullName') : $LoggedAdminInfo->name_admin }}">
                            @if($errors->has('fullName'))
                                <div class="alert alert-warning" role="alert">
                                    @error('fullName'){{$message}}@enderror
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo3" class="col-sm-2 col-form-label font-weight-bold text-right">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="phone" id="infoo3" value="{{ old('phone')? old('phone') : $LoggedAdminInfo->phone_admin }}">
                            @if($errors->has('phone'))
                                <div class="alert alert-warning" role="alert">
                                    @error('phone'){{$message}}@enderror
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo4" class="col-sm-2 col-form-label font-weight-bold text-right">Email</label>
                        <div class="col-sm-10">
                            <input name="email" type="text" class="form-control" id="infoo4" value="{{ old('email')? old('email') : $LoggedAdminInfo->email_admin }}">
                            @if($errors->has('email'))
                                <div class="alert alert-warning" role="alert">
                                    @error('email'){{$message}}@enderror
                                </div>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo5" class="col-sm-2 col-form-label font-weight-bold text-right">Joined</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="infoo5" value="{{ $LoggedAdminInfo->created_at }}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo6" class="col-sm-2 col-form-label font-weight-bold text-right">Last Updated</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control" id="infoo6" value="{{ $LoggedAdminInfo->updated_at }}">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="infoo7" class="col-sm-2 col-form-label font-weight-bold text-right">Action</label>
                        <div class="col-sm-10">
                            <button class="btn btn-primary form-control" id="infoo7" type="submit">Update</button>
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

