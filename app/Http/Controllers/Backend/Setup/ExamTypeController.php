<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeController extends Controller
{
    // ExamTypeView
    public function ExamTypeView(){
        $data['allData'] = ExamType::all();
        return view('backend.setup.exam_type.exam_type_view', $data);
    }

    // ExamTypeAdd
    public function ExamTypeAdd(){
        return view('backend.setup.exam_type.add_exam_type');
    }

    // StoreExamType
    public function StoreExamType(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name',
        ]);

        $data = new ExamType();
        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Tipo de Examen Agregada con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    // ExamTypeEdit
    public function ExamTypeEdit($id){
        $editData = ExamType::find($id);
        return view('backend.setup.exam_type.edit_exam_type', compact('editData'));
    }

    // UpdateExamType
    public function UpdateExamType(Request $request, $id){
        $data = ExamType::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:exam_types,name,' . $data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Tipo de Examen Actualizado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('exam.type.view')->with($notification);
    }

    // DeleteExamType
    public function DeleteExamType($id){
        $data = ExamType::find($id);
        $data->delete();

        // Desplegar notificación
        $notification = array(
            'message' => 'Tipo de Examen Eliminado con éxito!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }




}
