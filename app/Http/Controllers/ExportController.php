<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use PDF;

class ExportController extends Controller
{
    //
    public function memberPDF($id){
        $member = Member::where('id_member', '=', $id)->first();
        $pdf = PDF::loadview('admin.memberPrint', compact('member'));
        return $pdf->download('member_'.$id.'.pdf');
    }
}
