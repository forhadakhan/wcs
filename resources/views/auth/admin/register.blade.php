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
                                    <a href="{{url("a/dashboard")}}"><span class="badge badge-pill badge-dark">Dashboard</span></a>
                                    <h3 class="text-center font-weight-light my-4">Admin Register</h3>
                                </div>
                                <div class="card-body">

                                    <form action="{{route('auth.admin.register')}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        @include('alertMessage')

                                        <div class="form-group">
                                            <label class="small mb-1 form-label" for="formFile">Image</label> <br>
                                            <div class="custom-file">
                                                <input name="img" type="file" value="{{ old('img') }}" class="custom-file-input form-control" id="formFile">
                                                <label class="custom-file-label" for="formFile" data-browse="Select">Add admin's image</label>
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
                                            <label class="small mb-1" for="inputDesignation">Designation</label>
                                            <input required class="form-control py-4" value="{{ old('role') }}" id="inputDesignation" type="text" name="role" placeholder="Director/Officer/Operator" />
                                            @if($errors->has('role'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('role'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inlineFormCustomSelect">Type</label>
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="type">
                                                <option selected value=0>ADMIN</option>
                                                <option value=1>SUPER ADMIN</option>
                                            </select>
                                            @if($errors->has('type'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('type'){{$message}}@enderror
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
                                            <label class="small mb-1" for="inputBDay">Birth Date</label>
                                            <input required class="form-control py-4"  value="{{ old('bday') }}" id="inputBDay" type="date" name="bday" placeholder="Enter birth date" />
                                            @if($errors->has('bday'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('bday'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputJoiningData">Joining Date</label>
                                            <input required class="form-control py-4"  value="{{ old('joined') }}" id="inputJoiningData" type="date" name="joined" placeholder="Enter joining date" />
                                            @if($errors->has('joined'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('joined'){{$message}}@enderror
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
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputComment">Comment</label>
                                            <input class="form-control py-4" value="{{ old('comment') }}" id="inputComment" type="text" name="comment" placeholder="Comment about staff..." />
                                            @if($errors->has('comment'))
                                                <div class="alert alert-warning" role="alert">
                                                    @error('comment'){{$message}}@enderror
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary mx-auto" type="submit">Register</button>
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
