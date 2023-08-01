<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    // SchoolSubjectView
    public function SchoolSubjectView(){
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.school_subject_view', $data);
    }

    // SchoolSubjectAdd
    public function SchoolSubjectAdd(){
        return view('backend.setup.school_subject.add_school_subject');
    }

    // StoreSchoolSubject
    public function StoreSchoolSubject(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:school_subjects,name',
        ]);

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Curso Agregado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }


}
