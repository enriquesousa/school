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



}
