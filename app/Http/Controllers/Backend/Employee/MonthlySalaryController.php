<?php

namespace App\Http\Controllers\Backend\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\Rule;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;


class MonthlySalaryController extends Controller
{
    // MonthlySalaryView
    public function MonthlySalaryView(){
        return view('backend.employee.monthly_salary.monthly_salary_view');
    }

    // MonthlySalaryGet
    public function MonthlySalaryGet(Request $request){

    }



}
