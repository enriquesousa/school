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
        $year_id = $request->year_id;
        $class_id = $request->class_id;
        $exam_type_id = $request->exam_type_id;
        $id_no = $request->id_no;

        $count_reprobados = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->where('marks', '<', '33')->get()->count();
        // dd($count_reprobados);

        $singleStudent = StudentMarks::where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->first();

        if ($singleStudent == true) {

            $allMarks = StudentMarks::with(['assign_subject','year'])->where('year_id', $year_id)->where('class_id', $class_id)->where('exam_type_id', $exam_type_id)->where('id_no', $id_no)->get();
            // dd($allMarks->toArray());
            // array:1 [▼ // app/Http/Controllers/Backend/Report/MarkSheetController.php:39
            //     0 => array:12 [▼
            //         "id" => 7
            //         "student_id" => 12
            //         "id_no" => "20190012"
            //         "year_id" => 1
            //         "class_id" => 1
            //         "assign_subject_id" => 20
            //         "exam_type_id" => 1
            //         "marks" => 60.0
            //         "created_at" => "2023-08-26T18:32:30.000000Z"
            //         "updated_at" => "2023-08-26T18:32:30.000000Z"
            //         "assign_subject" => array:8 [▼
            //         "id" => 20
            //         "class_id" => 1
            //         "subject_id" => 1
            //         "full_mark" => 100.0
            //         "pass_mark" => 70.0
            //         "subjective_mark" => 100.0
            //         "created_at" => "2023-08-03T05:19:16.000000Z"
            //         "updated_at" => "2023-08-03T05:19:16.000000Z"
            //         ]
            //         "year" => array:4 [▼
            //         "id" => 1
            //         "name" => "2019"
            //         "created_at" => "2023-07-31T10:02:34.000000Z"
            //         "updated_at" => "2023-07-31T10:02:34.000000Z"
            //         ]
            //     ]
            //     ]

            $allGrades = MarksGrade::all();
            return view('backend.report.mark_sheet.mark_sheet_pdf', compact('allMarks', 'allGrades', 'count_reprobados'));

        } else {

            // Desplegar notificación
            $notification = array(
                'message' => 'No hay datos con esta condición!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }





    }



}
