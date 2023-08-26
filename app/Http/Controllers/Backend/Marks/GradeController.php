<?php

namespace App\Http\Controllers\Backend\Marks;

use App\Http\Controllers\Controller;
use App\Models\MarksGrade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    // MarksGradeView
    public function MarksGradeView(){
        $data['allData'] = MarksGrade::all();
        return view('backend.marks.grade_marks_view', $data);
    }




}
