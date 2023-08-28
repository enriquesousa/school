<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AccountStudentFee;


class StudentFeeController extends Controller
{
    // StudentFeeView
    public function StudentFeeView(){
       $data['allData'] = AccountStudentFee::all();
       return view('backend.account.student_fee.student_fee_view', $data);
    }
}
