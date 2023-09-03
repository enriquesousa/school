<?php

namespace App\Http\Controllers\Backend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AccountOtherCost;


class OtherCostController extends Controller
{
    // OtherCostView
    public function OtherCostView(){
        $data['allData'] = AccountOtherCost::orderBy('id', 'DESC')->get();
        return view('backend.account.other_cost.other_cost_view', $data);
    }

    // OtherCostAdd
    public function OtherCostAdd(){
        return view('backend.account.other_cost.other_cost_add');
    }

    // OtherCostStore
    public function OtherCostStore(Request $request){
        $cost = new AccountOtherCost();
        $cost->date = date('Y-m-d', strtotime($request->date));
        $cost->amount = $request->amount;

        if ($request->file('image')) {
            $file = $request->file('image');
            //@unlink(public_path('upload/user_images/'.$data->image));    // Borra la imagen anterior, solo se necesita cuando estemos editando
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cost_images'), $filename);
            $cost['image'] = $filename;
        }

        $cost->description = $request->description;
        $cost->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Otros Costos Insertado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('other.cost.view')->with($notification);

    }


}
