@extends('layouts.forms')

@section('title')
    <title>WCS | Register</title>
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
                                    <h3 class="text-center font-weight-light my-4">Admin Register</h3>
                                </div>
                                <div class="card-body">

                                    <form action="{{route('auth.admin.register')}}" method="POST">
                                        @csrf

                                        @include('alertMessage')

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
                                            <label class="small mb-1" for="inputFullName">Role</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="role">
                                                <option selected value="ADMIN">ADMIN</option>
                                                <option value="SUPER_ADMIN">SUPER ADMIN</option>
                                            </select>
                                            @if($errors->has('role'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('role'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Phone</label>
                                            <input required class="form-control py-4"  value="{{ old('phone') }}" id="inputEmailAddress" type="tel" name="phone" placeholder="Enter phone number" />
                                            @if($errors->has('phone'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('phone'){{$message}}@enderror
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
                                            <button class="btn btn-primary" type="submit">Register</button>
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
