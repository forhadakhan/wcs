
<div class="modal fade" id="serviceModal_11" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title text-dark text-muted font-weight-light" id="exampleModalLabel2">Service Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="border rounded-lg">
                <div class="card-header text-dark">
                    <h3 class="text-center font-weight-bold">Financial Service Records</h3>
                </div>
                <div class="card-body text-dark text-left">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($serviceHistory as $sh)
                                    <tr>
                                        <td>{{$sh['title_sr']}}</td>
                                        <td>{{$sh['status_sr']}}</td>
                                        <td>
                                            <div class="btn-group">
                                                @if ($sh['status_sr'] == 'PROCESSING')
                                                    <a href="{{ url('member/services/cancel/'.$sh['id_sr']) }}" class="btn btn-danger btn-sm"> Cancel </a>
                                                @else
                                                    <a href="#" role="button" aria-disabled="true" class="btn btn-dark btn-sm disabled"> Cancel </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-center">
                    {{-- <div class="font-weight-light text-center"><a href="#" target="_blank">Terms and Condition</a></div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div> --}}
    </div>
    </div>
</div>
