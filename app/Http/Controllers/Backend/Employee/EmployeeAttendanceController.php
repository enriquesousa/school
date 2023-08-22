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
use App\Models\EmployeeLeave;

use App\Models\EmployeeAttendance;


class EmployeeAttendanceController extends Controller
{
    // EmployeeAttendanceView
    public function EmployeeAttendanceView(){
       $data['allData'] = EmployeeAttendance::orderBy('id', 'DESC')->get();
       return view('backend.employee.employee_attendance.employee_attendance_view', $data);
    }

    // EmployeeAttendanceAdd
    public function EmployeeAttendanceAdd(){
       $data['employees'] = User::where('usertype', 'Employee')->get();
       return view('backend.employee.employee_attendance.employee_attendance_add', $data);
    }

    // EmployeeAttendanceStore
    public function EmployeeAttendanceStore(Request $request){

    }


}
