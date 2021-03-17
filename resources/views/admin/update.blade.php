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
                @include('alertMessage')
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 mb-4">
                    <form action="{{ route('auth.admin.updateAdmin') }}" method="POST">
                        @csrf
                        <fieldset class="fsd"><legend>Basic</legend>
                        <input class="d-none" name="id" type="hidden" value="{{ $LoggedAdminInfo->id_admin }}">

                        <hr>
                        <div class="form-group row">
                        <label for="infoo1" class="col-sm-4 col-form-label font-weight-bold text-right">Type</label>
                            <div class="col-sm-8">
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="type">
                                    @if ($LoggedAdminInfo->type_admin == 1)
                                        <option value=0>ADMIN</option>
                                        <option selected value=1>SUPER ADMIN</option>
                                    @else
                                        <option selected value=0>ADMIN</option>
                                        <option value=1>SUPER ADMIN</option>
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
                            <label for="infoo2" class="col-sm-4 col-form-label font-weight-bold text-right">Name</label>
                            <div class="col-sm-8">
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
                            <label for="infoo3" class="col-sm-4 col-form-label font-weight-bold text-right">Phone</label>
                            <div class="col-sm-8">
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
                            <label for="infoo5" class="col-sm-4 col-form-label font-weight-bold text-right">Account Created</label>
                            <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="infoo5" value="{{ $LoggedAdminInfo->created_at }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="infoo6" class="col-sm-4 col-form-label font-weight-bold text-right">Last Updated</label>
                            <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="infoo6" value="{{ $LoggedAdminInfo->updated_at }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="infoo7" class="col-sm-4 col-form-label font-weight-bold text-right">Action</label>
                            <div class="col-sm-8">
                                <button class="btn btn-primary form-control" id="infoo7" type="submit">Update</button>
                            </div>
                        </div>
                        <hr>
                    </fieldset>
                    </form>
                    </div>

                    <div class="col-lg-8 mb-4">
                    <form action="{{ route('auth.admin.updateAdminSecurity') }}" method="POST">
                        @csrf
                        <fieldset class="fsd"><legend>Security</legend>
                        <input class="d-none" name="id" type="hidden" value="{{ $LoggedAdminInfo->id_admin }}">

                        <hr>
                        <div class="form-group row">
                            <label for="infoo4" class="col-sm-4 col-form-label font-weight-bold text-right">Email</label>
                            <div class="col-sm-8">
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
                            <label for="currentPass" class="col-sm-4 col-form-label font-weight-bold text-right">Current Password</label>
                            <div class="col-sm-8">
                                <input required name="currentPassword" class="form-control" value="{{ old('password') }}" id="currentPass" type="password" placeholder="Enter current password" />
                                @if($errors->has('currentPassword'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('currentPassword'){{$message}}@enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bold text-right"" for="inputPassword">New Password</label>
                            <div class="col-sm-8">
                                <input required class="form-control" value="{{ old('password') }}" id="inputPassword" type="password" name="password" placeholder="Enter new password" />
                                @if($errors->has('password'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('password'){{$message}}@enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bold text-right"" for="inputPassword">Confirm Password</label>
                            <div class="col-sm-8">
                                <input required class="form-control" id="inputPassword" type="password" name="password_confirmation" placeholder="Re-enter new password" />
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="info12" class="col-sm-4 col-form-label font-weight-bold text-right">Action</label>
                            <div class="col-sm-8">
                                <button class="btn btn-danger form-control" id="info12" type="submit">Update</button>
                            </div>
                        </div>
                        <hr>
                    </fieldset>
                    </form>
                    </div>
                </div>
            </div>
        </main>

        @include('admin.footer')
    </div>
</div>
@endsection

