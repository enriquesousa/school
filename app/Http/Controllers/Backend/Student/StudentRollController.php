<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;


class StudentRollController extends Controller
{
    // StudentRoleView
    public function StudentRollView(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('backend.student.roll_generate.roll_generate_view',$data);

    }


}
