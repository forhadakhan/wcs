<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;



class AdminAuthController extends Controller
{
    //
    function login()
    {
        return view('auth.admin.login');
    }


    function register()
    {
        return view('auth.admin.register');
    }

    function registerMember()
    {
        return view('auth.member.addMember');
    }


    function create(Request $request)
    {
        $request->validate([
            'fullName' => 'required|max:69',
            'role' => 'required',
            'phone' => 'required|max:15|min:3',
            'email' => 'required|email|max:69|unique:admins_tbl,email_admin',
            'password' => 'required|confirmed|min:4|max:25'
        ]);

        // If form validated succesfully, then register new user

        $admin = new Admin;
        $admin->name_admin = $request->fullName;
        $admin->role_admin = $request->role;
        $admin->phone_admin = $request->phone;
        $admin->email_admin = $request->email;
        $admin->password_admin = Hash::make($request->password);

        $query = $admin->save();

        // Above code (same) using QUERY BUILDER
        // $query = DB::table('admins_tbl')
        //                 ->insert([
        //                     'name_admin' => $request->fullName,
        //                     'role_admin' => $request->role,
        //                     'phone_admin' => $request->phone,
        //                     'email_admin' => $request->email,
        //                     'password_admin' => Hash::make($request->password)
        //                 ]);

        if ($query) {
            return back()->with('success', 'Admin registered succesfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    function check(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required|email|max:69',
            'password' => 'required|min:4|max:25'
        ]);

        // If form validated successfully, then process login
        $admin = Admin::where('email_admin', '=', $request->email)->first();
        if ($admin) {
            if (Hash::check($request->password, $admin->password_admin)) {
                // if password matched, then redirect admin to dashboard
                $request->session()->put(['LoggedAdmin' => $admin->id_admin, 'LoggedAdminRole' => $admin->role_admin]);

                return redirect('dashboard')->with('adminData');

            } else {
                return back()->with('fail', 'Invalid password');
            }
        } else {
            return back()->with('fail', 'No account found for this email');
        }
    }


    function dashboard()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $adminData = [
                'LoggedAdminInfo' => $admin,
                'totalSuperAdmin' => DB::table('admins_tbl')->where('role_admin','=','SUPER_ADMIN')->count(),
                'totalGeneralAdmin' => DB::table('admins_tbl')->where('role_admin','=','ADMIN')->count(),
                'totalApplications' => DB::table('applications_tbl')->count()
            ];

            return view('admin.dashboard', $adminData);
        }
    }


    function profile()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $adminData = [
                'LoggedAdminInfo' => $admin
            ];

            return view('admin.profile', $adminData);
        }
    }

    function updateView()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $adminData = [
                'LoggedAdminInfo' => $admin
            ];

            return view('admin.update', $adminData);
        }
    }

    function updateAdmin(Request $request)
    {
        if (session()->has('LoggedAdmin') == $request->input('id')){
            $request->validate([
                'fullName' => 'required|max:69',
                'role' => 'required',
                'phone' => 'required|max:15|min:3',
            ]);

            $current_timestamp = Carbon::now()->toDateTimeString();

            // If form validated succesfully, then update

            $updating = DB::table('admins_tbl')
                            ->where('id_admin', $request->input('id'))
                            ->update([
                                'name_admin' => $request->fullName,
                                'role_admin' => $request->role,
                                'phone_admin' => $request->phone,
                                'updated_at' => $current_timestamp
                            ]);

            if($updating){
                return redirect('profile/admin')->with('success', 'Admin data updated');
            }
            else{
                return back()->with('fail', 'Something went wrong. Updating failed');
            }
        }
        else{
            return redirect('profile/admin');
        }
    }


    function allAdmins()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $data = Admin::all();

            $adminData = [
                'LoggedAdminInfo' => $admin,
                'admins' => $data
            ];

            return view('admin.admins', $adminData);
        }
    }


    function edit()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $data = Admin::all();

            $adminData = [
                'LoggedAdminInfo' => $admin,
                'admins' => $data
            ];

            return view('admin.edit', $adminData);
        }
    }

    function makeEdit($id)
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $data = DB::table('admins_tbl')
                        ->where('id_admin', $id)
                        ->first();

            $adminData = [
                'LoggedAdminInfo' => $admin,
                'adminInfo' => $data
            ];

            return view('admin.makeEdit', $adminData);
        }
    }

    function updateAdminBySuper(Request $request){
        $request->validate([
            'fullName' => 'required|max:69',
            'role' => 'required',
            'phone' => 'required|max:15|min:3',
        ]);

        $current_timestamp = Carbon::now()->toDateTimeString();

        // If form validated succesfully, then update

        $updating = DB::table('admins_tbl')
                        ->where('id_admin', $request->input('id'))
                        ->update([
                            'name_admin' => $request->fullName,
                            'role_admin' => $request->role,
                            'phone_admin' => $request->phone,
                            'updated_at' => $current_timestamp
                        ]);

        if($updating){
            return redirect('admins/edit')->with('success', 'Admin data updated');
        }
        else{
            return back()->with('fail', 'Something went wrong. Updating failed');
        }
    }


    function deleteAdminBySuper($id){
        $delete = DB::table('admins_tbl')
                ->where('id_admin', $id)
                ->delete();

        return redirect('admins/edit')->with('success', 'Admin Removed');
    }


    function applications()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $data = Application::all();

            $adminData = [
                'LoggedAdminInfo' => $admin,
                'applications' => $data
            ];

            return view('admin.applications', $adminData);
        }
    }


    function logout()
    {
        if (session()->has('LoggedAdmin')) {

            session()->pull('LoggedAdmin');

            return redirect('login/admin');
        }
    }


    function createMember(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'fullName' => 'required|max:69',
            'bday' => 'required',
            'phone' => 'required|max:15|min:3',
            'nid' => 'required|max:17|min:10',
            'email' => 'required|email|max:69|unique:admins_tbl,email_admin',
            'password' => 'required|confirmed|min:4|max:25'
        ]);

        // If form validated succesfully, then register new user

        $member = new Member;
        $member->type_member = $request->type;
        // $member->img_member = $request->file('img')->store('public/images');
        $member->img_member = Storage::putFile('images', $request->file('img'));
        $member->name_member = $request->fullName;
        $member->birthday_member = $request->bday;
        $member->phone_member = $request->phone;
        $member->nid_member = $request->nid;
        $member->email_member = $request->email;
        $member->password_member = Hash::make($request->password);

        // if($request->hasFile('img')){
        //     $file = $request->file('img');
        //     $extension = $file->getClientOriginalExtension(); //get image extension
        //     $filename = time().'.'.$extension;
        //     $file->move('uploads/members/', $filename);
        //     $member->img_member = $filename;
        // }
        // else {
        //     $member->img_member = '';
        // }

        $query = $member->save();

        // Above code (same) using QUERY BUILDER
        // $query = DB::table('admins_tbl')
        //                 ->insert([
        //                     'name_admin' => $request->fullName,
        //                     'role_admin' => $request->role,
        //                     'phone_admin' => $request->phone,
        //                     'email_admin' => $request->email,
        //                     'password_admin' => Hash::make($request->password)
        //                 ]);

        if ($query) {
            return back()->with('success', 'Admin registered succesfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

}
