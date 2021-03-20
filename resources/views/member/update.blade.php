@extends('layouts.masterDash')

@section('title')
    <title>WCS | Update</title>
@endsection


@section('content')

    @include('member.nav')

<div id="layoutSidenav">

    @include('member.sideNav')

    <div id="layoutSidenav_content">
        <main>

            <div class="container">
                <h1 class="mt-4 page-heading text-dark">Update Profile</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">{{ explode(" ", $LoggedMemberInfo->name_member)[0] }}</li>
                    <li class="breadcrumb-item active">Update</li>
                </ol>
            </div>

            <div class="container">
                @include('alertMessage')
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 mb-4">
                    <form action="{{ route('auth.member.updateMember') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="fsd"><legend>Basic</legend>
                        <input class="d-none" name="id" type="hidden" value="{{ $LoggedMemberInfo->id_member }}">

                        <hr>
                        <div class="form-group row">
                        <label for="infoo1" class="col-sm-4 col-form-label font-weight-bold text-right">Type</label>
                            <div class="col-sm-8">
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="type">
                                    @if ($LoggedMemberInfo->type_member == 1)
                                        <option selected value="1">Select</option>
                                        <option value="2">Regular</option>
                                        <option value="3">Basic</option>
                                        <option value="4">Platinum</option>
                                        <option value="5">Gold</option>
                                    @elseif ($LoggedMemberInfo->type_member == 2)
                                        <option value="1">Select</option>
                                        <option selected value="2">Regular</option>
                                        <option value="3">Basic</option>
                                        <option value="4">Platinum</option>
                                        <option value="5">Gold</option>
                                    @elseif ($LoggedMemberInfo->type_member == 3)
                                        <option value="1">Select</option>
                                        <option value="2">Regular</option>
                                        <option selected value="3">Basic</option>
                                        <option value="4">Platinum</option>
                                        <option value="5">Gold</option>
                                    @elseif ($LoggedMemberInfo->type_member == 4)
                                        <option value="1">Select</option>
                                        <option value="2">Regular</option>
                                        <option value="3">Basic</option>
                                        <option selected value="4">Platinum</option>
                                        <option value="5">Gold</option>
                                    @else
                                        <option value="1">Select</option>
                                        <option value="2">Regular</option>
                                        <option value="3">Basic</option>
                                        <option value="4">Platinum</option>
                                        <option selected value="5">Gold</option>
                                    @endif

                                </select>
                                @if($errors->has('type'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('type'){{$message}}@enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="infoo2" class="col-sm-4 col-form-label font-weight-bold text-right">Name</label>
                            <div class="col-sm-8">
                            <input type="text" class="form-control" id="infoo2" name="fullName" value="{{ old('fullName')? old('fullName') : $LoggedMemberInfo->name_member }}">
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
                            <input type="text" class="form-control" name="phone" id="infoo3" value="{{ old('phone')? old('phone') : $LoggedMemberInfo->phone_member }}">
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
                                <input required type="date" name="bday" class="form-control py-4"  value="{{ old('bday')? old('bday') : $LoggedMemberInfo->birthday_member }}" id="inputBDay" placeholder="Enter birth date" />
                                @if($errors->has('bday'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('bday'){{$message}}@enderror
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label font-weight-bold text-right" for="inputGender">Gender</label>
                            <div class="input-group col-sm-8">
                                <span class="pl-5 form-control">
                                    <input class="form-check-input" type="radio" name="gender" id="genderRadios1" value="M">
                                    <label class="form-check-label" for="genderRadios1"> Male </label>
                                </span>
                                <span class="pl-5 form-control">
                                    <input class="form-check-input" type="radio" name="gender" id="genderRadios2" value="F" checked>
                                    <label class="form-check-label" for="genderRadios2"> Female </label>
                                </span>
                                <span class="pl-5 form-control">
                                    <input class="form-check-input" type="radio" name="gender" id="genderRadios3" value="O">
                                    <label class="form-check-label" for="genderRadios3"> Other </label>
                                </span>
                            </div>
                            @if($errors->has('gender'))
                                <div class="alert alert-warning" role="alert">
                                    @error('gender'){{$message}}@enderror
                                </div>
                            @endif
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="infoo5" class="col-sm-4 col-form-label font-weight-bold text-right">Account Created</label>
                            <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="infoo5" value="{{ $LoggedMemberInfo->created_at }}">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="infoo6" class="col-sm-4 col-form-label font-weight-bold text-right">Last Updated</label>
                            <div class="col-sm-8">
                            <input type="text" readonly class="form-control" id="infoo6" value="{{ $LoggedMemberInfo->updated_at }}">
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
                    <form action="{{ route('auth.member.updateMemberSecurity') }}" method="POST">
                        @csrf
                        <fieldset class="fsd"><legend>Security</legend>
                        <input class="d-none" name="id" type="hidden" value="{{ $LoggedMemberInfo->id_member }}">

                        <hr>
                        <div class="form-group row">
                            <label for="infoo4" class="col-sm-4 col-form-label font-weight-bold text-right">Email</label>
                            <div class="col-sm-8">
                                <input name="email" type="text" class="form-control" id="infoo4" value="{{ old('email')? old('email') : $LoggedMemberInfo->email_member }}">
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

