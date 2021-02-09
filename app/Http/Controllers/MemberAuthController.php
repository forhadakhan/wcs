<?php

namespace App\Http\Controllers;

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
                    $request->session()->put(['LoggedMember' => $member->id_member]);
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

            $memberData = [
                'LoggedMemberInfo' => $member
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
            if($member->img_member != ''){
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



}
