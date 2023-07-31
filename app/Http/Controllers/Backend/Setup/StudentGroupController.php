<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{

    // StudentGroupView
    public function StudentGroupView(){
        $data['allData'] = StudentGroup::all();
        return view('backend.setup.group.view_group',$data);
    }

    // StudentGroupAdd
    public function StudentGroupAdd(){
        return view('backend.setup.group.add_group');
    }

    // StudentStoreGroup
    public function StudentStoreGroup(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name',
        ]);

        $data = new StudentGroup();
        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Grupo Agregado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }

    // StudentGroupEdit
    public function StudentGroupEdit($id){
        $editData = StudentGroup::find($id);
        return view('backend.setup.group.edit_group',compact('editData'));
    }

    // UpdateStudentGroup
    public function UpdateStudentGroup(Request $request, $id){
        $data = StudentGroup::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:student_groups,name,'.$data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Grupo Actualizado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('student.group.view')->with($notification);
    }

    // DeleteStudentGroup
    public function DeleteStudentGroup($id){
        $data = StudentGroup::find($id);
        $data->delete();

        // Desplegar notificación
        $notification = array(
            'message' => 'Grupo Eliminado con éxito!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

}
