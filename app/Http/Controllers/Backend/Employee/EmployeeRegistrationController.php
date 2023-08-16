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
        $data['designations'] = Designation::all();
        return view('backend.employee.employee_registration.employee_add', $data);
    }

    // EmployeeRegistrationStore
    public function EmployeeRegistrationStore(Request $request){

        $validateData = $request->validate([
            'email' => 'required|unique:users',
        ]);

        DB::transaction(function () use ($request) {

            // para el empleado vamos a tomar como base de si ID el año  y mes en que ingreso!
            $checkYear = date('Ym',strtotime($request->join_date));
            // dd($checkYear);

            // Tomar el ultimo estudiante registrado!
            $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first();

            // Para generar el ID 'id_no' del Estudiante queda del tipo: ano+1, ejemplo: 20190001
            if ($employee == null) {
                $firstReg = 0;
                $employeeId = $firstReg + 1;
                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }
            } else {
                $employee = User::where('usertype', 'Employee')->orderBy('id', 'DESC')->first()->id;
                $employeeId = $employee + 1;
                if ($employeeId < 10) {
                    $id_no = '000' . $employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00' . $employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0' . $employeeId;
                }

            } // end else

            $final_id_no = $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Employee';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->salary = $request->salary;
            $user->designation_id = $request->designation_id;
            $user->join_date = date('Y-m-d', strtotime($request->join_date));
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();


            $employee_salary = new EmployeeSalaryLog();
            $employee_salary->employee_id = $user->id;
            $employee_salary->effected_salary = date('Y-m-d', strtotime($request->join_date));
            $employee_salary->previous_salary = $request->salary;
            $employee_salary->present_salary = $request->salary;
            $employee_salary->increment_salary = '0';
            $employee_salary->save();


        });


        $notification = array(
            'message' => 'Empleado Registrado con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('employee.registration.view')->with($notification);
    }

    // EmployeeRegistrationEdit
    public function EmployeeRegistrationEdit($id){

        $data['editData'] = User::find($id);
        $data['designations'] = Designation::all();
        return view('backend.employee.employee_registration.employee_edit', $data);

    }



}
