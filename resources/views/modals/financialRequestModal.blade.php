
<div class="modal fade" id="serviceModal_1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-dark text-muted font-weight-light" id="exampleModalLabel">Service Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="border rounded-lg">
                <div class="card-header text-dark">
                    <h3 class="text-center font-weight-bold">Financial Service Request</h3>
                </div>
                <div class="card-body text-dark text-left">

                    <form action="{{ route('service_request_financial') }}" method="POST">
                        @csrf

                        {{-- @include('alertMessage') --}}

                        <div class="form-row">
                            <div class="col-sm-12">
                                <label class="small mb-1" for="inputTitle">Requesting for </label>
                                <div class="form-group border rounded p-2">
                                    <div class="input-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sub_category" id="radioLoan" value=2 >
                                            <label class="form-check-label" for="radioLoan"> Loan </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sub_category" id="radioFunding" value=3>
                                            <label class="form-check-label" for="radioFunding"> Funding </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="sub_category" id="radioEmergency" value=4>
                                            <label class="form-check-label" for="radioEmergency"> Emergency Needs </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input checked class="form-check-input" type="radio" name="sub_category" id="radioOthers" value=1>
                                            <label class="form-check-label" for="radioOthers"> Others </label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="small mb-1" for="inputTitle">Title</label>
                                    <input required name="title" value="{{ old('title') }}" class="form-control py-4" id="inputTitle" type="text" placeholder="Enter request title/subject" />
                                    @if($errors->has('title'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('title'){{$message}}@enderror
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label class="small mb-1" for="body">Body</label>
                                <textarea required name="body" value="{{ old('body') }}" class="form-control py-4" id="body" placeholder="A brief explanation about your request.."></textarea>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="small mb-1" for="amount">Amount</label>
                                    <input required name="amount" value="{{ old('amount') }}" class="form-control py-4" id="amount" type="text" placeholder="Enter the amount you are expecting (in numbers only)" />
                                    @if($errors->has('amount'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('amount'){{$message}}@enderror
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="small mb-1" for="BD">Need before</label>
                                <input class="form-control py-4"  value="{{ old('bofore_date') }}" id="BD" type="date" name="bofore_date" placeholder="You need this before.." />
                                @if($errors->has('bofore_date'))
                                    <div class="alert alert-warning" role="alert">
                                        @error('bofore_date'){{$message}}@enderror
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mt-4 mb-0">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
