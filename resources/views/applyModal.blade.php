
<div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-dark text-muted font-weight-light" id="exampleModalLabel">Become a member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="border rounded-lg">
                <div class="card-header text-dark">
                    <h3 class="text-center font-weight-bold">apply for membership</h3>
                </div>
                <div class="card-body text-dark text-left">

                    <form action="{{ route('application') }}" method="POST">
                        @csrf

                        {{-- @include('alertMessage') --}}

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

                        <div class="form-group mt-4 mb-0">
                            <button type="submit" class="btn btn-primary btn-block"  data-toggle="modal" data-target="#alertMsg">Apply</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div class="font-weight-light text-center"><a href="#" target="_blank">Terms and Condition</a></div>
                </div>
            </div>
        </div>
        {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> --}}
    </div>
    </div>
</div>
