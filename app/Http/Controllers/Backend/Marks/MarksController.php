<?php

namespace App\Http\Controllers\Backend\Marks;

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

use App\Models\StudentMarks;
use App\Models\ExamType;



class MarksController extends Controller
{
    // MarksAdd
    public function MarksAdd(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['exam_types'] = ExamType::all();

        return view('backend.marks.marks_add', $data);
    }

    // MarksStore
    public function MarksStore(Request $request){

        $studentList = $request->student_id;
        if ($studentList) {
            for ($i=0; $i < count($studentList); $i++) {
                $marks = new StudentMarks();
                $marks->year_id = $request->year_id;
                $marks->class_id = $request->class_id;
                $marks->assign_subject_id = $request->assign_subject_id;
                $marks->exam_type_id = $request->exam_type_id;
                $marks->student_id = $request->student_id[$i];
                $marks->id_no = $request->id_no[$i];
                $marks->marks = $request->marks[$i];
                $marks->save();
            }
        }

        // Desplegar notificación
        $notification = array(
            'message' => 'Calificaciones Guardadas con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }




}
