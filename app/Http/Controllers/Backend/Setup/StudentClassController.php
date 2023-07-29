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

    // StudentClassAdd
    public function StudentClassAdd(){
        return view('backend.setup.student_class.add_class');
    }

    // StoreStudentClass
    public function StoreStudentClass(Request $request){

        $validateData = $request->validate([
            'name' => 'required|unique:student_classes,name',
        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Materia Agregada con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);

    }

    // StudentClassEdit
    public function StudentClassEdit($id){
        $editData = StudentClass::find($id);
        return view('backend.setup.student_class.edit_class',compact('editData'));
    }

}
