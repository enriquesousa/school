<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentMarks;
use App\Models\ExamType;
use App\Models\StudentClass;
use App\Models\StudentYear;
use App\Models\MarksGrade;


class MarkSheetController extends Controller
{
    // MarkSheetGenerateView
    public function MarkSheetGenerateView(){
        $data['years'] = StudentYear::orderBy('id', 'desc')->get();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.report.mark_sheet.mark_sheet_view', $data);
    }

    // MarkSheetGenerateGet
    public function MarkSheetGenerateGet(Request $request){

    }



}
