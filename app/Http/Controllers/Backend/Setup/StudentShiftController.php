<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    // StudentShiftView
    public function StudentShiftView(){
        $data['allData'] = StudentShift::all();
        return view('backend.setup.shift.view_shift', $data);
    }

    // StudentShiftAdd
    public function StudentShiftAdd(){
        return view('backend.setup.shift.add_shift');
    }

    // StoreStudentShift
    public function StoreStudentShift(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name',
        ]);

        $data = new StudentShift();
        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Horario Agregado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }

    // StudentShiftEdit
    public function StudentShiftEdit($id){
        $editData = StudentShift::find($id);
        return view('backend.setup.shift.edit_shift', compact('editData'));
    }


}
