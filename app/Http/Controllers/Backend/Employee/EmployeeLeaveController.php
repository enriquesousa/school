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
use App\Models\LeavePurpose;

class EmployeeLeaveController extends Controller
{
    // EmployeeLeaveView
    public function EmployeeLeaveView(){
        $data['allData'] = EmployeeLeave::orderBy('id', 'DESC')->get();
        return view('backend.employee.employee_leave.employee_leave_view', $data);
    }

    // EmployeeLeaveAdd
    public function EmployeeLeaveAdd(){
        $data['employees'] = User::where('usertype', 'Employee')->get();
        $data['leave_purpose'] = LeavePurpose::all();
        return view('backend.employee.employee_leave.employee_leave_add', $data);
    }

    // EmployeeLeaveStore
    public function EmployeeLeaveStore(Request $request){

        if ($request->leave_purpose_id == '0'){
            $leavePurpose = new LeavePurpose();
            $leavePurpose->name = $request->motivo_nuevo;
            $leavePurpose->save();
            $leave_purpose_id = $leavePurpose->id;
        }else{
            $leave_purpose_id = $request->leave_purpose_id;
        }

        $data = new EmployeeLeave();
        $data->employee_id = $request->employee_id;
        $data->leave_purpose_id = $leave_purpose_id;
        $data->start_date = date('Y-m-d', strtotime($request->start_date));
        $data->end_date = date('Y-m-d', strtotime($request->end_date));
        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Motivo de Ausencia del Empleado Registrado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('employee.leave.view')->with($notification);
    }




}
