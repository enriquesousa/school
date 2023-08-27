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

    // MarksGradeAdd
    public function MarksGradeAdd(){
       return view('backend.marks.grade_marks_add');
    }

    // MarksGradeStore
    public function MarksGradeStore(Request $request){

       $data = new MarksGrade();
       $data->grade_name = $request->grade_name;
       $data->grade_point = $request->grade_point;
       $data->start_marks = $request->start_marks;
       $data->end_marks = $request->end_marks;
       $data->start_point = $request->start_point;
       $data->end_point = $request->end_point;
       $data->remarks = $request->remarks;
       $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Grado Guardado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('marks.entry.grade')->with($notification);

    }


}
