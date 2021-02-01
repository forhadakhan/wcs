<div class="results">
    @if (Session::get('success'))
        <div class="alert alert-success font-weight-bold">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::get('fail'))
        <div class="alert alert-danger font-weight-bold">
            {{ Session::get('fail') }}
        </div>
    @endif
</div>
