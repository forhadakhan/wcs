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

/////////////////////////////////////////////////////////////////////////////
//- Login-Logout Related -//////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

    function login()
    {
        return view('auth.admin.login');
    }


    function logout()
    {
        if (session()->has('LoggedAdmin')) {

            session()->pull('LoggedAdmin');
            session()->pull('LoggedAdminRole');

            return redirect('login/admin');
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

                return redirect('a/dashboard');

            } else {
                return back()->with('fail', 'Invalid password');
            }
        } else {
            return back()->with('fail', 'We do not recognize your email');
        }
    }


/////////////////////////////////////////////////////////////////////////////
//- Admin Related -/////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

    function register()
    {
        return view('auth.admin.register');
    }


    function createAdmin(Request $request)
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
        $adminEmail = json_decode(DB::table('admins_tbl')->where('id_admin', $request->input('id'))
                                    ->select('email_admin')->get(), true)[0]['email_admin'];

        if (session()->has('LoggedAdmin') == $request->input('id')){
            $request->validate([
                'fullName' => 'required|max:69',
                'role' => 'required',
                'phone' => 'required|max:15|min:3',
            ]);

            if($adminEmail != $request->email){
                $request->validate([
                    'email' => 'required|email|max:69|unique:admins_tbl,email_admin',
                ]);
            }

            $current_timestamp = Carbon::now()->toDateTimeString();

            // If form validated succesfully, then update

            $updating = DB::table('admins_tbl')
                            ->where('id_admin', $request->input('id'))
                            ->update([
                                'name_admin' => $request->fullName,
                                'role_admin' => $request->role,
                                'phone_admin' => $request->phone,
                                'email_admin' => $request->email,
                                'updated_at' => $current_timestamp
                            ]);

            if($updating){
                return back()->with('success', 'Admin data updated');
            }
            else{
                return back()->with('fail', 'Something went wrong. Updating failed');
            }
        }
        else{
            return redirect('a/profile');
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

    function updateAdminBySuper(Request $request)
    {
        $adminEmail = json_decode(DB::table('admins_tbl')->where('id_admin', $request->input('id'))
                                    ->select('email_admin')->get(), true)[0]['email_admin'];

        if (session()->has('LoggedAdmin') == $request->input('id')){
            $request->validate([
                'fullName' => 'required|max:69',
                'role' => 'required',
                'phone' => 'required|max:15|min:3',
            ]);

            if($adminEmail != $request->email){
                $request->validate([
                    'email' => 'required|email|max:69|unique:admins_tbl,email_admin',
                ]);
            }

            $current_timestamp = Carbon::now()->toDateTimeString();

            // If form validated succesfully, then update

            $updating = DB::table('admins_tbl')
                            ->where('id_admin', $request->input('id'))
                            ->update([
                                'name_admin' => $request->fullName,
                                'role_admin' => $request->role,
                                'phone_admin' => $request->phone,
                                'email_admin' => $request->email,
                                'updated_at' => $current_timestamp
                            ]);

            if($updating){
                return back()->with('success', 'Admin data updated');
            }
            else{
                return back()->with('fail', 'Something went wrong. Updating failed');
            }
        }
        else{
            return back();
        }
    }


    function deleteAdminBySuper($id)
    {
        $delete = DB::table('admins_tbl')
                ->where('id_admin', $id)
                ->delete();

        return back()->with('success', 'Admin Removed');
    }


/////////////////////////////////////////////////////////////////////////////
//- Member Applications Related -///////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

    function applications()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $data = Application::where('status_application', '=', false)->select('*')->get();

            $adminData = [
                'LoggedAdminInfo' => $admin,
                'applications' => $data,
                'status' => false
            ];

            return view('admin.applications', $adminData);
        }
    }


    function applicationChecked()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $data = Application::where('status_application', '=', true)->select('*')->get();

            $adminData = [
                'LoggedAdminInfo' => $admin,
                'applications' => $data,
                'status' => true
            ];

            return view('admin.applications', $adminData);
        }
    }


    function applicationCheck($id)
    {
        $affected = DB::table('applications_tbl')
                    ->where('id_application', $id)
                    ->update(['status_application' => true]);

        if($affected){
            return back()->with('success', 'Application Marked as Checked');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    function applicationUncheck($id)
    {
        $affected = DB::table('applications_tbl')
                    ->where('id_application', $id)
                    ->update(['status_application' => false]);

        if($affected){
            return back()->with('success', 'Application Marked as Unhecked');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    function applicationDelete($id)
    {
        $delete = DB::table('applications_tbl')
                ->where('id_application', $id)
                ->delete();

        if($delete){
            return back()->with('success', 'Application Removed');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


/////////////////////////////////////////////////////////////////////////////
//- Member Related -////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

    function registerMember()
    {
        return view('auth.member.addMember');
    }


    function createMember(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'img' => 'mimes:jpg,jpge,png|max:2048',
            'fullName' => 'required|max:69|min:3',
            'bday' => 'required',
            'gender' => 'required',
            'phone' => 'required|max:15|min:3|unique:members_tbl,phone_member',
            'nid' => 'required|max:17|min:10',
            'email' => 'required|email|max:69|unique:members_tbl,email_member',
            'password' => 'required|confirmed|min:4|max:25'
        ]);

        // Renaming and storing the image.
        if($request->hasFile('img')){
            if ($request->file('img')->isValid())
            {
                $file = $request->file('img');
                $img = date('Ymd').time().'.'.$file->extension();
                $path = $file->move(public_path('storage\\images'), $img);
            }
        }
        else {
            $img = '';
        }

        // If form validated succesfully, then register new user

        $member = new Member;
        $member->type_member = $request->type;
        $member->img_member = $img;
        $member->name_member = $request->fullName;
        $member->birthday_member = $request->bday;
        $member->gender_member = $request->gender;
        $member->phone_member = $request->phone;
        $member->nid_member = $request->nid;
        $member->email_member = $request->email;
        $member->password_member = Hash::make($request->password);


        $query = $member->save();


        if ($query) {
            return back()->with('success', 'Member registered succesfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    function allMembers()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $data = Member::all();

            $adminData = [
                'LoggedAdminInfo' => $admin,
                'members' => $data
            ];

            return view('admin.members', $adminData);
        }
    }


    function memberBlock($id)
    {
        $affected = DB::table('members_tbl')
                    ->where('id_member', $id)
                    ->update(['access_member' => false]);

        if($affected){
            return back()->with('success', 'Member Blocked');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    function memberUnblock($id)
    {
        $affected = DB::table('members_tbl')
                    ->where('id_member', $id)
                    ->update(['access_member' => true]);

        if($affected){
            return back()->with('success', 'Member Unblocked');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    function memberDelete($id)
    {
        $delete = DB::table('members_tbl')
                ->where('id_member', $id)
                ->delete();

        if($delete){
            return back()->with('success', 'Member Removed');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    function memberView($id)
    {
        return "view page";
    }

}
