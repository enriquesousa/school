<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AccountStudentFee;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\FeeCategory;


class StudentFeeController extends Controller
{
    // StudentFeeView
    public function StudentFeeView(){
       $data['allData'] = AccountStudentFee::all();
       return view('backend.account.student_fee.student_fee_view', $data);
    }

    // StudentFeeAdd
    public function StudentFeeAdd(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['fee_categories'] = FeeCategory::all();

        return view('backend.account.student_fee.student_fee_add', $data);
    }

    // StudentFeeGetStudent
    public function StudentFeeGetStudent(Request $request){

    }

    // StudentFeeStore
    public function StudentFeeStore(Request $request){

    }


}
