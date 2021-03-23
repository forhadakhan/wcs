<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\ServiceRequests;
use App\Models\ServiceRequestTypes;

class ApplicationController extends Controller
{
    //
    function show(){

        $data = Application::all();

        return view('admin.applications', ['applications' => $data]);
    }
}
