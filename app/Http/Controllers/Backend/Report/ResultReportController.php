<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\ExamType;
use App\Models\StudentMarks;
use Barryvdh\DomPDF\Facade\Pdf;

class ResultReportController extends Controller
{
    // StudentResultView
    public function StudentResultView(){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.report.student_result.student_result_view', $data);
    }

    // StudentResultGet
    public function StudentResultGet(Request $request){
       
        

    }


}
