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


class EmployeeRegistrationController extends Controller
{
    // EmployeeRegistrationView
    public function EmployeeRegistrationView(){

        $data['allData'] = User::where('usertype', 'Employee')->get();
        return view('backend.employee.employee_registration.employee_view',$data);
    }

    // EmployeeRegistrationAdd
    public function EmployeeRegistrationAdd(){
        $data['designation'] = Designation::all();
        return view('backend.employee.employee_registration.employee_add', $data);
    }




}
