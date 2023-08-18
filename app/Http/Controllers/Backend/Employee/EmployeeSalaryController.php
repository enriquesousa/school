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

class EmployeeSalaryController extends Controller
{

    // EmployeeSalaryView
    public function EmployeeSalaryView(){
        $data['allData'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee_salary.employee_salary_view',$data);
    }

    // EmployeeSalaryIncrement
    public function EmployeeSalaryIncrement($id){

        $data['editData'] = User::find($id);
        return view('backend.employee.employee_salary.employee_salary_increment',$data);

    }

    // EmployeeSalaryUpdateIncrementStore
    public function EmployeeSalaryUpdateIncrementStore(Request $request, $id){



    }



}




