<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    // DesignationView
    public function DesignationView(){
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation', $data);
    }

    // DesignationAdd
    public function DesignationAdd(){
        return view('backend.setup.designation.add_designation');
    }

    // DesignationStore
    public function DesignationStore(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Designación Agregada con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }

    // DesignationEdit
    public function DesignationEdit($id){
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation', compact('editData'));
    }

    // DesignationUpdate
    public function DesignationUpdate(Request $request, $id){
        $data = Designation::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:designations,name,' . $data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Designación Actualizada con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }

    // DesignationDelete
    public function DesignationDelete($id){
        $data = Designation::find($id);
        $data->delete();

        // Desplegar notificación
        $notification = array(
            'message' => 'Designación Eliminada con éxito!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }


}
