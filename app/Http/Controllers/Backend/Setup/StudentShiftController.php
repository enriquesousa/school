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

    // UpdateStudentShift
    public function UpdateStudentShift(Request $request, $id){
        $data = StudentShift::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_shifts,name,' . $data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Horario Actualizado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.shift.view')->with($notification);
    }

    // DeleteStudentShift
    public function DeleteStudentShift($id){
        $data = StudentShift::find($id);
        $data->delete();

        // Desplegar notificación
        $notification = array(
            'message' => 'Horario Eliminado con éxito!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }


}
