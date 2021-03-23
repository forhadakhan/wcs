@extends('layouts.masterDash')

@push('css')
    <style>
        @font-face {
            font-family: BeautyMountains;
            src: url("{{asset('resources/fonts/BeautyMountains.ttf')}}");
        }
    </style>
@endpush

@section('title')
    <title>WCS | Update Admin</title>
@endsection


@section('content')

    @include('admin.nav')

<div id="layoutSidenav">

    @include('admin.sideNav')

    <div id="layoutSidenav_content">
        <main>
            <div class="container">
                <h1 class="mt-4 page-heading text-dark">Update Admin</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">LAB</li>
                    <li class="breadcrumb-item active">Admins</li>
                    <li class="breadcrumb-item active">Edit Admin</li>
                </ol>
            </div>

            <div class="container">
                @include('alertMessage')
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 mb-4">
                    <form action="{{ route('auth.admin.updateAdminBySuper') }}" method="POST">
                        @csrf
                        <fieldset class="fsd"><legend>Basic</legend>
                        <input class="d-none" name="id" type="hidden" value="{{ $adminInfo->id_admin }}">

                        <hr>
                        <div class="form-group row">
                            <label for="infoo2" class="col-sm-4 col-form-label font-weight-bold text-right">Name</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="infoo2" name="fullName" value="{{ old('fullName')? old('fullName') : $adminInfo->name_admin }}">
                                @if($errors->has('fullName'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('fullName'){{$message}}@enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="infoo2" class="col-sm-4 col-form-label font-weight-bold text-right">Designation</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="infoo2" name="role" value="{{ old('role')? old('role') : $adminInfo->role_admin }}">
                                @if($errors->has('role'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('role'){{$message}}@enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                        <label for="infoo1" class="col-sm-4 col-form-label font-weight-bold text-right">Type</label>
                            <div class="col-sm-8">
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="type">
                                    @if ($adminInfo->type_admin == 1)
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
                            <label for="infoo3" class="col-sm-4 col-form-label font-weight-bold text-right">Phone</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" name="phone" id="infoo3" value="{{ old('phone')? old('phone') : $adminInfo->phone_admin }}">
                                @if($errors->has('phone'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('phone'){{$message}}@enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bold text-right" for="inputBDay">Birth Date</label>
                            <div class="col-sm-8">
                                <input required type="date" name="bday" class="form-control py-4"  value="{{ old('bday')? old('bday') : $adminInfo->birthday_admin }}" id="inputBDay" placeholder="Enter birth date" />
                                @if($errors->has('bday'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('bday'){{$message}}@enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bold text-right" for="inputJDay">Joining Date</label>
                            <div class="col-sm-8">
                                <input required type="date" name="joined" class="form-control py-4"  value="{{ old('joined')? old('joined') : $adminInfo->joined_admin }}" id="inputJDay" placeholder="Enter birth date" />
                                @if($errors->has('joined'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('joined'){{$message}}@enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="infoo5" class="col-sm-4 col-form-label font-weight-bold text-right">Account Created</label>
                            <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="infoo5" value="{{ $adminInfo->created_at }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="infoo6" class="col-sm-4 col-form-label font-weight-bold text-right">Last Updated</label>
                            <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="infoo6" value="{{ $adminInfo->updated_at }}">
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
                        <form action="{{ route('auth.admin.updateAdminSecurityBySuper') }}" method="POST">
                            @csrf
                            <fieldset class="fsd"><legend>Security</legend>
                            <input class="d-none" name="id" type="hidden" value="{{ $adminInfo->id_admin }}">

                            <hr>
                            <div class="form-group row">
                                <label for="infoo4" class="col-sm-4 col-form-label font-weight-bold text-right">Email</label>
                                <div class="col-sm-8">
                                    <input name="email" type="text" class="form-control" id="infoo4" value="{{ old('email')? old('email') : $adminInfo->email_admin }}">
                                    @if($errors->has('email'))
                                        <div class="alert alert-warning" role="alert">
                                            @error('email'){{$message}}@enderror
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

