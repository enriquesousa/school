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

        $user = User::find($id);
        $previous_salary = $user->salary;
        $present_salary = (float)$previous_salary + (float)$request->increment_salary;
        $user->salary = $present_salary;
        $user->save();

        $salaryData = new EmployeeSalaryLog();
        $salaryData->employee_id = $id;
        $salaryData->previous_salary = $previous_salary;
        $salaryData->increment_salary = $request->increment_salary;
        $salaryData->present_salary = $present_salary;
        $salaryData->effected_salary = date('Y-m-d',strtotime($request->effected_salary));
        $salaryData->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Incremento de Salario Actualizado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('employee.salary.view')->with($notification);
    }



}




