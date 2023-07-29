<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;


class StudentClassController extends Controller
{
    // StudentClassView
    public function StudentClassView(){
        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }
}
