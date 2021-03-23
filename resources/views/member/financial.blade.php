@extends('layouts.masterDash')

@section('title')
    <link rel="stylesheet" href=" {{ asset('resources/css/profileCardStyle.css') }}">
    <title>WCS | Services</title>
@endsection


@section('content')

    @include('member.nav')

<div id="layoutSidenav">

    @include('member.sideNav')

    <div id="layoutSidenav_content">
        <main>

            <div class="container">
                <h1 class="mt-4 page-heading text-dark">Services</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">CORE</li>
                    <li class="breadcrumb-item active">Services</li>
                </ol>
            </div>

            @include('alertMessage')

            <div class="container">
                <div class="modal-content">
                    <div class="">
                        <div class="border rounded-lg">
                            <div class="card-header text-dark">
                                <h3 class="text-center font-weight-bold">Financial Service Request</h3>
                            </div>
                            <div class="card-body text-dark text-left">

                                <form action="{{ route('service_request_financial') }}" method="POST">
                                    @csrf

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
                                            <input required class="form-control py-4"  value="{{ old('bofore_date') }}" id="BD" type="date" name="bofore_date" placeholder="You need this before.." />
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



        </main>

        @include('admin.footer')
    </div>
</div>
@endsection

