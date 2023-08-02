<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\SchoolSubject;


class AssignSubjectController extends Controller
{
    // AssignSubjectView
    public function AssignSubjectView(){
        // $data['allData'] = AssignSubject::all();
        $data['allData'] = AssignSubject::select('class_id')->groupBy('class_id')->get();
       return view('backend.setup.assign_subject.view_assign_subject', $data);
    }

    // AssignSubjectAdd
    public function AssignSubjectAdd(){
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }

    // StoreAssignSubject
    public function StoreAssignSubject(Request $request){

        $subjectCount = count($request->subject_id);
        if ($subjectCount != null) {
            for ($i = 0; $i < $subjectCount; $i++) {
                $assign_subject = new AssignSubject();
                $assign_subject->class_id = $request->class_id;
                $assign_subject->subject_id = $request->subject_id[$i];
                $assign_subject->full_mark = $request->full_mark[$i];
                $assign_subject->pass_mark = $request->pass_mark[$i];
                $assign_subject->subjective_mark = $request->subjective_mark[$i];
                $assign_subject->save();
            }
        }

        // Desplegar notificación
        $notification = array(
            'message' => 'Materias asignadas con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('assign.subject.view')->with($notification);

    }




}
