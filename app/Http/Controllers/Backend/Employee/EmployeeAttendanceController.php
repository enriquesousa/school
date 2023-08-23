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
        // $data['allData'] = EmployeeAttendance::orderBy('id', 'DESC')->get();
        $data['allData'] = EmployeeAttendance::select('date')->groupBy('date')->orderBy('date', 'DESC')->get();
        return view('backend.employee.employee_attendance.employee_attendance_view', $data);
    }

    // EmployeeAttendanceAdd
    public function EmployeeAttendanceAdd(){
       $data['employees'] = User::where('usertype', 'Employee')->get();
       return view('backend.employee.employee_attendance.employee_attendance_add', $data);
    }

    // EmployeeAttendanceStore
    public function EmployeeAttendanceStore(Request $request){

        // primero vamos a borrar todos los registros de la fecha seleccionada
        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request->date)))->delete();


        $countEmployee = count($request->employee_id);

        for($i=0; $i<$countEmployee; $i++){
            $attend_status = 'attend_status'.$i;

            $attend = new EmployeeAttendance();
            $attend->employee_id = $request->employee_id[$i];
            $attend->date = date('Y-m-d', strtotime($request->date));
            $attend->attend_status = $request->$attend_status;
            $attend->save();
        }

        // Desplegar notificación
        $notification = array(
            'message' => 'Asistencias de empleado actualizadas con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('employee.attendance.view')->with($notification);
    }

    // EmployeeAttendanceEdit
    public function EmployeeAttendanceEdit($date){
       $data['editData'] = EmployeeAttendance::where('date', $date)->get();
       $data['employees'] = User::where('usertype', 'Employee')->get();
       return view('backend.employee.employee_attendance.employee_attendance_edit', $data);
    }

    // EmployeeAttendanceDetails
    public function EmployeeAttendanceDetails($date){
        $data['allData'] = EmployeeAttendance::where('date', $date)->get();
        return view('backend.employee.employee_attendance.employee_attendance_details', $data);
    }

}
