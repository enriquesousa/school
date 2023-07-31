<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use Illuminate\Http\Request;


class FeeCategoryController extends Controller
{

    // FeeCategoryView
    public function FeeCategoryView(){
        $data['allData'] = FeeCategory::all();
        return view('backend.setup.fee_category.view_fee_category', $data);
    }

    // FeeCategoryAdd
    public function FeeCategoryAdd(){
        return view('backend.setup.fee_category.add_fee_category');
    }

    // StoreFeeCategory
    public function StoreFeeCategory(Request $request){
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = new FeeCategory();
        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Categoría de Cargo Agregada con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }

    // FeeCategoryEdit
    public function FeeCategoryEdit($id){
        $editData = FeeCategory::find($id);
        return view('backend.setup.fee_category.edit_fee_category', compact('editData'));
    }

    // UpdateFeeCategory
    public function UpdateFeeCategory(Request $request, $id){
        $data = FeeCategory::find($id);

        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name,' . $data->id,
        ]);

        $data->name = $request->name;
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Categoría de Cobro Actualizada con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.category.view')->with($notification);
    }

    // DeleteFeeCategory
    public function DeleteFeeCategory($id){
        $data = FeeCategory::find($id);
        $data->delete();

        // Desplegar notificación
        $notification = array(
            'message' => 'Categoría de Cobro Eliminada con éxito!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

}
