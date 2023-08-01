<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\FeeCategoryAmount;


class FeeAmountController extends Controller
{
    // FeeAmountView
    public function FeeAmountView()
    {
        // $data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupBy('fee_category_id')->get();

        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }

    // FeeAmountAdd
    public function FeeAmountAdd()
    {
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    // StoreFeeAmount
    public function StoreFeeAmount(Request $request)
    {

        $countClass = count($request->class_id);
        if ($countClass != null) {
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }
        }

        // Desplegar notificación
        $notification = array(
            'message' => 'Datos Insertados con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);

    }


    public function EditFeeAmount($fee_category_id)
    {
        $data['editData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        // dd($data['editData']->toArray());

        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.edit_fee_amount', $data);

    }

    // UpdateFeeAmount
    public function UpdateFeeAmount(Request $request, $fee_category_id)
    {

        if ($request->class_id == null) {

            // Desplegar notificación
            $notification = array(
                'message' => 'Tienes que seleccionar al menos una clase!',
                'alert-type' => 'error'
            );
            return redirect()->route('fee.amount.edit', $fee_category_id)->with($notification);

        } else {

            $countClass = count($request->class_id);

            // primero borrar todos los datos anteriores
            FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete();

            // ahora grabar todos los datos que estén presentes en la forma.e
            for ($i = 0; $i < $countClass; $i++) {
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }

        }

        // Desplegar notificación
        $notification = array(
            'message' => 'Datos Actualizados con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('fee.amount.view')->with($notification);

    }

    // FeeAmountDetails
    public function FeeAmountDetails($fee_category_id){
        $data['detailsData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        return view('backend.setup.fee_amount.details_fee_amount', $data);
    }


}
