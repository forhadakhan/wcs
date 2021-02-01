@extends('layouts.forms')

@section('title')
    <title>WCS | Apply for Membership</title>
@endsection

@section('content')
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                            <div class="card-header">
                                <span>
                                    <a href="/"><i class="fas fa-home"></i></a>
                                </span>
                                <p class="font-weight-light text-center mt-4">If you read and understood our
                                    <a href="#" target="_blank">Terms and Condition</a>, then you can</p>
                                <h3 class="text-center font-weight-bold mb-4">apply for membership</h3>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('application') }}" method="POST">
                                    @csrf

                                    <div class="results">
                                        @if (Session::get('success'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif
                                        @if (Session::get('fail'))
                                            <div class="alert alert-danger">
                                                {{ Session::get('fail') }}
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputName">Full Name</label>
                                                <input required name="fullName" value="{{ old('fullName') }}" class="form-control py-4" id="inputName" type="text" placeholder="Enter full name" />
                                                @if($errors->has('fullName'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('fullName'){{$message}}@enderror
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="phone">Phone Number</label>
                                                <input required name="phone" value="{{ old('phone') }}" class="form-control py-4" id="phone" type="tel" placeholder="+8801234567890" />
                                                @if($errors->has('phone'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('phone'){{$message}}@enderror
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input name="email" value="{{ old('email') }}" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="whyInterested">How can WCS help you?</label>
                                        <textarea name="whyInterested" value="{{ old('whyInterested') }}" class="form-control py-4" id="whyInterested" placeholder="Share with us why you are  to join WCS.."></textarea>
                                    </div>

                                    <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Apply</button></div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{url('login')}}">Want to get in? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
