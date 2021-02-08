@extends('layouts.forms')

@section('title')
    <title>WCS | Login</title>
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
                                    <span>
                                        <a href="/"><i class="fas fa-home"></i></a>
                                    </span>
                                    <h3 class="text-center font-weight-light my-4">Admin Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{route('auth.admin.check')}}" method="POST">
                                        @csrf

                                        @include('alertMessage')

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
                                            <input required class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Enter password" />
                                            @if($errors->has('password'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('password'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        {{-- <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                            </div>
                                        </div> --}}
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            {{-- <a class="small" href="password.html">Forgot Password?</a> --}}
                                            <button class="btn btn-primary mx-auto" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="{{url('login')}}">Member Login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
