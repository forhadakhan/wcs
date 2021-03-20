<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Member;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



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
            session()->pull('LoggedAdminType');
            session()->pull('LoggedAdminImg');

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

                if($admin->img_admin != null){
                    $adminImg = "storage/images/".$admin->img_admin;
                } else {
                    $adminImg = "resources/img/user.png";
                }

                $request->session()->put([
                        'LoggedAdmin' => $admin->id_admin,
                        'LoggedAdminType' => $admin->type_admin,
                        'LoggedAdminImg' => $adminImg
                    ]);

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
            'type' => 'required',
            'phone' => 'required|max:15|min:3',
            'email' => 'required|email|max:69|unique:admins_tbl,email_admin',
            'password' => 'required|confirmed|min:4|max:25'
        ]);

        // Renaming and storing the image.
        if($request->hasFile('img')){
            $request->validate([
                'img' => 'mimes:jpg,jpge,png|max:2048'
            ]);
            if ($request->file('img')->isValid())
            {
                $file = $request->file('img');
                $img = date('Ymd').time().'.'.$file->extension();
                $path = $file->move(public_path('storage\\images'), $img);
            }
        }
        else {
            $img = null;
        }

        // If form validated succesfully, then register new user
        $admin = new Admin;
        $admin->img_admin = $img;
        $admin->name_admin = $request->fullName;
        $admin->role_admin = $request->role;
        $admin->type_admin = $request->type;
        $admin->phone_admin = $request->phone;
        $admin->birthday_admin = $request->bday;
        $admin->joined_admin = $request->joined;
        $admin->email_admin = $request->email;
        $admin->password_admin = Hash::make($request->password);
        $admin->comment_admin = $request->comment;

        $query = $admin->save();

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
                'totalActiveAdmin' => DB::table('admins_tbl')->where('access_admin', '=', true)->count(),
                'totalApplications' => DB::table('applications_tbl')->where('status_application','=',false)->count(),
                'totalActiveMembers' => DB::table('members_tbl')->where('access_member','=',true)->count(),
                'totalAdmin' => DB::table('admins_tbl')->count()
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
        if (session('LoggedAdmin') == $request->input('id')){
            $request->validate([
                'fullName' => 'required|max:69',
                'type' => 'required',
                'phone' => 'required|max:15|min:3',
            ]);

            $current_timestamp = Carbon::now()->toDateTimeString();

            // If form validated succesfully, then update
            $updating = Admin::where('id_admin', $request->input('id'))
                                ->update([
                                    'name_admin' => $request->fullName,
                                    'type_admin' => $request->type,
                                    'phone_admin' => $request->phone,
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

    function updateAdminSecurity(Request $request)
    {
        $admin = Admin::where('id_admin', '=', $request->id)->first();
        if (session('LoggedAdmin') == $request->input('id'))
        {
            $request->validate([
                'email' => 'required|email|max:69',
                'currentPassword' => 'required|min:4|max:30',
                'password' => 'required|confirmed|min:4|max:30'
            ]);

            if ((Hash::check($request->currentPassword, $admin->password_admin)) && ($admin->password_admin != null))
            {
                if($admin->email_admin != $request->email){
                    $request->validate([
                        'email' => 'unique:admins_tbl,email_admin'
                    ]);
                }

                $current_timestamp = Carbon::now()->toDateTimeString();

                // If form validated succesfully, then update
                $updating = Admin::where('id_admin', $request->input('id'))
                                    ->update([
                                        'email_admin' => $request->email,
                                        'password_admin' => Hash::make($request->password),
                                        'updated_at' => $current_timestamp
                                    ]);

                if($updating){
                    return back()->with('success', 'Admin security data updated');
                }
                else{
                    return back()->with('fail', 'Something went wrong. Security updating failed');
                }
            } else{
                return back()->with('fail', 'Invalid password');
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

            return view('admin.allAdmins', $adminData);
        }
    }


    function activeAdmins()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $data = Admin::where('access_admin', '=', true)->select('*')->get();

            $adminData = [
                'LoggedAdminInfo' => $admin,
                'admins' => $data,
                'access' => true
            ];

            return view('admin.admins', $adminData);
        }
    }


    function blockedAdmins()
    {
        if (session()->has('LoggedAdmin')) {
            $admin = Admin::where('id_admin', '=', session('LoggedAdmin'))->first();

            $data = Admin::where('access_admin', '=', false)->select('*')->get();

            $adminData = [
                'LoggedAdminInfo' => $admin,
                'admins' => $data,
                'access' => false
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
        if (session('LoggedAdminType') == 1)
        {
            $request->validate([
                'fullName' => 'required|max:69',
                'type' => 'required',
                'role' => 'required',
                'bday' => 'required',
                'joined' => 'required',
                'phone' => 'required|max:15|min:3',
            ]);

            $current_timestamp = Carbon::now()->toDateTimeString();

            // If form validated succesfully, then update
            $updating = Admin::where('id_admin', $request->id)
                                ->update([
                                    'name_admin' => $request->fullName,
                                    'role_admin' => $request->role,
                                    'type_admin' => $request->type,
                                    'phone_admin' => $request->phone,
                                    'birthday_admin' => $request->bday,
                                    'joined_admin' => $request->joined,
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

    function updateAdminSecurityBySuper(Request $request)
    {
        $admin = Admin::where('id_admin', '=', $request->id)->first();
        if (session('LoggedAdminType') == 1)
        {
            $request->validate([
                'email' => 'required|email|max:69',
                'password' => 'required|confirmed|min:4|max:30'
            ]);

            if($admin->email_admin != $request->email){
                $request->validate([
                    'email' => 'unique:admins_tbl,email_admin'
                ]);
            }

            $current_timestamp = Carbon::now()->toDateTimeString();

            // If form validated succesfully, then update
            $updating = Admin::where('id_admin', $request->id)
                                ->update([
                                    'email_admin' => $request->email,
                                    'password_admin' => Hash::make($request->password),
                                    'updated_at' => $current_timestamp
                                ]);

            if($updating){
                return back()->with('success', 'Admin security data updated');
            }
            else{
                return back()->with('fail', 'Something went wrong. Security updating failed');
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

    function adminBlock($id)
    {
        $affected = DB::table('admins_tbl')
                    ->where('id_admin', $id)
                    ->update(['access_admin' => false]);

        if($affected){
            return back()->with('success', 'Admin Blocked');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


    function adminUnblock($id)
    {
        $affected = DB::table('admins_tbl')
                    ->where('id_admin', $id)
                    ->update(['access_admin' => true]);

        if($affected){
            return back()->with('success', 'Admin Unblocked');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
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
            $img = null;
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
            $memberTypes = ['', 'None', 'Regular', 'Basic', 'Platinum', 'Gold'];

            $adminData = [
                'LoggedAdminInfo' => $admin,
                'members' => $data,
                'memberTypes' => $memberTypes
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
