<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApplyController extends Controller
{
    //
    function show()
    {
        return view('apply');
    }

    function record(Request $request)
    {
        $request->validate([
            'fullName' => 'required|max:69',
            'phone' => 'required|max:15|min:3|unique:applications_tbl,phone_application',
        ]);

        // If form validated succesfully, then record application

        $newApply = new Application;
        $newApply->fullName_application = $request->fullName;
        $newApply->phone_application = $request->phone;
        $newApply->email_application = $request->email;
        $newApply->whyInterested_application = $request->whyInterested;

        $query = $newApply->save();

        if ($query) {
            return back()->with('success', 'Your response has been recorded');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

}
