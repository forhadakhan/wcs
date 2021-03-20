<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Member;
use App\Models\MemberType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberAuthController extends Controller
{

/////////////////////////////////////////////////////////////////////////////
//- Login-Logout Related -////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

    public function login()
    {
        return view('auth.member.login');
    }


    public function check(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required|email|max:69',
            'password' => 'required|min:4|max:25'
        ]);

        // If form validated successfully, then process login
        $member = Member::where('email_member', '=', $request->email)->first();
        if ($member)
        {
            if (Hash::check($request->password, $member->password_member)) {
                // if password matched, then check access
                if($member->access_member == true)
                {
                    // if has access then redirect member to home
                    if($member->img_member != null){
                        $memberImg = "storage/images/".$member->img_member;
                    } else {
                        $memberImg = "resources/img/user.png";
                    }

                    $request->session()->put([
                            'LoggedMember' => $member->id_member,
                            'LoggedMemberImg' => $memberImg
                        ]);

                    return redirect('member');
                }
                else {
                    return back()->with('fail', "You Don't Have Access");
                }

            } else {
                return back()->with('fail', 'Invalid password');
            }
        }
        else {
            return back()->with('fail', 'We do not recognize your email');
        }
    }


    function logout()
    {
        if (session()->has('LoggedMember')) {

            session()->pull('LoggedMember');
            session()->pull('LoggedMemberImg');

            return redirect('login');
        }
    }


/////////////////////////////////////////////////////////////////////////////
//- Member Related -////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////

    function index()
    {
        if (session()->has('LoggedMember'))
        {
            $member = Member::where('id_member', '=', session('LoggedMember'))->first();
            if($member->img_member != null){
                $memberImg = "storage/images/".$member->img_member;
            } else {
                $memberImg = "resources/img/user.png";
            }

            $memberData = [
                'LoggedMemberInfo' => $member,
                'MemeberImg' => $memberImg
            ];

            return view('member.member', $memberData);
        }
    }


    function profile()
    {
        if (session()->has('LoggedMember'))
        {
            $member = Member::where('id_member', '=', session('LoggedMember'))->first();
            $memberType = MemberType::where('id_member_type', '=', $member->type_member)->select('name_member_type')->first();
            if($member->img_member != null){
                $memberImg = "storage/images/".$member->img_member;
            } else {
                $memberImg = "resources/img/user.png";
            }

            $memberData = [
                'LoggedMemberInfo' => $member,
                'MemberType' => $memberType,
                'MemeberImg' => $memberImg
            ];

            return view('member.profile', $memberData);
        }
    }

    function updateView()
    {
        if (session()->has('LoggedMember')) {
            $member = Member::where('id_member', '=', session('LoggedMember'))->first();

            $memberData = [
                'LoggedMemberInfo' => $member
            ];

            return view('member.update', $memberData);
        }
    }

    function updateMember(Request $request)
    {
        if (session('LoggedMember') == $request->input('id')){
            $request->validate([
                'fullName' => 'required|max:69',
                'type' => 'required',
                'phone' => 'required|max:15|min:3',
            ]);

            $current_timestamp = Carbon::now()->toDateTimeString();

            // If form validated succesfully, then update
            $updating = Member::where('id_member', $request->input('id'))
                                ->update([
                                    'name_member' => $request->fullName,
                                    'type_member' => $request->type,
                                    'phone_member' => $request->phone,
                                    'birthday_member' => $request->bday,
                                    'gender_member' => $request->gender,
                                    'updated_at' => $current_timestamp
                                ]);

            if($updating){
                return back()->with('success', 'Member data updated');
            }
            else{
                return back()->with('fail', 'Something went wrong. Updating failed');
            }
        }
        else{
            return redirect('a/profile');
        }
    }

    function updateMemberSecurity(Request $request)
    {
        $member = Member::where('id_member', '=', $request->id)->first();
        if (session('LoggedMember') == $request->input('id'))
        {
            $request->validate([
                'email' => 'required|email|max:69',
                'currentPassword' => 'required|min:4|max:30',
                'password' => 'required|confirmed|min:4|max:30'
            ]);

            if ((Hash::check($request->currentPassword, $member->password_member)) && ($member->password_member != null))
            {
                if($member->email_member != $request->email){
                    $request->validate([
                        'email' => 'unique:members_tbl,email_member'
                    ]);
                }

                $current_timestamp = Carbon::now()->toDateTimeString();

                // If form validated succesfully, then update
                $updating = Member::where('id_member', $request->input('id'))
                                    ->update([
                                        'email_member' => $request->email,
                                        'password_member' => Hash::make($request->password),
                                        'updated_at' => $current_timestamp
                                    ]);

                if($updating){
                    return back()->with('success', 'Member security data updated');
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

}
