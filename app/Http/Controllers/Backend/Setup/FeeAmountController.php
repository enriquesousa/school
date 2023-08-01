<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;
use App\Models\StudentClass;
use App\Models\FeeCategoryAmount;


class   FeeAmountController extends Controller
{
    // FeeAmountView
    public function FeeAmountView(){
        $data['allData'] = FeeCategoryAmount::all();
        return view('backend.setup.fee_amount.view_fee_amount', $data);
    }

    // FeeAmountAdd
    public function FeeAmountAdd(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.fee_amount.add_fee_amount', $data);
    }

    // StoreFeeAmount
    public function StoreFeeAmount(Request $request){


        $countClass = count($request->class_id);
        if ($countClass != null) {
            for ($i=0; $i < $countClass; $i++) {
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


}
