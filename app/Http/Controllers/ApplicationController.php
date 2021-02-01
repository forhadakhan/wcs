<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    //
    function show(){

        $data = Application::all();

        return view('admin.applications', ['applications' => $data]);

    }
}
