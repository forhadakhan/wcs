

{{-- PASSWORD --}}

    {{-- use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash; --}}


    {{-- {{
        $password1 = Hash::make('plain-text')
    }}

    {{ $password1 }}
    <br>
    @if (Hash::check('plain-text', $password1)) {
        // The passwords match...
        {{"Matched"}}
    }
    @endif --}}

{{-- PASSWORD_END --}}

<?php

// use Carbon\Carbon;
// $current_timestamp = Carbon::now()->toDateTimeString();

// echo $current_timestamp;




use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Application;

//  $total = DB::table('admins_tbl')->count();
//  echo $total;
// $aid = Session::get('LoggedAdmin');
// $aid2 = session('LoggedAdmin');

// echo $aid;
// echo $aid2;


//   $total2 = DB::table('admins_tbl')
//              ->where('id_admin', $aid2)
//              ->get();

// print_r($total2);

//  $admin = Admin::where('id_admin', '=', $aid2)->first();
//  echo $admin['role_admin'];
// echo $total2;
// return $total2;

// $applications = DB::table('applications_tbl')
//                     ->select('*')
//                     ->get();

// $applications = Application::select('*')->get();

// echo $applications;

