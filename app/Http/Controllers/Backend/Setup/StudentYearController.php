<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    // StudentYearView
    public function StudentYearView(){
        $data['allData'] = StudentYear::all();
        return view('backend.setup.year.view_year',$data);
    }

    // StudentYearAdd
    public function StudentYearAdd(){
        return view('backend.setup.year.add_year');
    }

    // StudentStoreYear
    public function StudentStoreYear(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name',
        ]);

        $data = new StudentYear();
        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Año Agregado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }

    // StudentYearEdit
    public function StudentYearEdit($id){
        $editData = StudentYear::find($id);
        return view('backend.setup.year.edit_year',compact('editData'));
    }

    // UpdateStudentYear
    public function UpdateStudentYear(Request $request, $id){
        $data = StudentYear::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_years,name,'.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Año Actualizado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.year.view')->with($notification);
    }

    // DeleteStudentYear
    public function DeleteStudentYear($id){
        $data = StudentYear::find($id);
        $data->delete();

        // Desplegar notificación
        $notification = array(
            'message' => 'Año Eliminado con éxito!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }



}
