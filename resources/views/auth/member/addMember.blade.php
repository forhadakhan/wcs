@extends('layouts.forms')

@section('title')
    <title>WCS | Add Member</title>
@endsection

@section('content')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                                <div class="card-header">
                                    <a href="{{url("dashboard")}}"><span class="badge badge-pill badge-dark">Dashboard</span></a>
                                    <h3 class="text-center font-weight-light my-4">Add Member</h3>
                                </div>
                                <div class="card-body">

                                    <form action="{{route('auth.member.add')}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        @include('alertMessage')

                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFullName">Type</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="type">
                                                <option selected value="1">Select</option>
                                                <option value="2">Regular</option>
                                                <option value="3">Basic</option>
                                                <option value="4">Platinum</option>
                                                <option value="5">Gold</option>
                                            </select>
                                            @if($errors->has('type'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('type'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1 form-label" for="formFile">Image</label> <br>
                                            <div class="custom-file">
                                                <input name="img" type="file" value="{{ old('img') }}" class="custom-file-input form-control" id="customFileLangHTML">
                                                <label class="custom-file-label" for="customFileLangHTML" data-browse="Select">Add member's image</label>
                                            </div>
                                            @if($errors->has('img'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('img'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputFullName">Full Name</label>
                                            <input required class="form-control py-4" value="{{ old('fullName') }}" id="inputFullName" type="text" name="fullName" placeholder="Enter full name" />
                                            @if($errors->has('fullName'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('fullName'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputBDay">Birth Date</label>
                                            <input required class="form-control py-4"  value="{{ old('bday') }}" id="inputBDay" type="date" name="bday" placeholder="Enter birth date" />
                                            @if($errors->has('bday'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('bday'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputGender">Gender</label>
                                            <div class="input-group">
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
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPhone">Phone</label>
                                            <input required class="form-control py-4"  value="{{ old('phone') }}" id="inputPhone" type="tel" name="phone" placeholder="Enter phone number" />
                                            @if($errors->has('phone'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('phone'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputNID">NID</label>
                                            <input required class="form-control py-4"  value="{{ old('nid') }}" id="inputNID" type="text" name="nid" placeholder="Enter NID number (10/17 digit)" />
                                            @if($errors->has('nid'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('nid'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input required class="form-control py-4" value="{{ old('email') }}" id="inputEmailAddress" type="email" name="email" placeholder="Enter email address" />
                                            @if($errors->has('email'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('email'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input required class="form-control py-4" value="{{ old('password') }}" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                            @if($errors->has('password'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('password'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Confirm Password</label>
                                            <input required class="form-control py-4" id="inputPassword" type="password" name="password_confirmation" placeholder="Re-enter password" />
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary mx-auto" type="submit">Add Member</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
