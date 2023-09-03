<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AccountEmployeeSalary;
use App\Models\AccountOtherCost;
use App\Models\AccountStudentFee;

use DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;

class ProfitController extends Controller
{
    // MonthlyProfitView
    public function MonthlyProfitView(){
        return view('backend.report.profit.profit_view');
    }



}
