<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\EmployeeAttendance;
use Barryvdh\DomPDF\Facade\Pdf;

class AttendanceReportController extends Controller
{
    // AttendanceReportView
    public function AttendanceReportView(){
        $data['employees'] = User::where('usertype', 'Employee')->get();
        return view('backend.report.attendance_report.attendance_report_view', $data);
    }

    // AttendanceReportGet
    public function AttendanceReportGet(Request $request){
       
        // Tomar el id del empleado
        $employee_id = $request->employee_id;
        if ($employee_id != '') {
            $where[] = ['employee_id', $employee_id];
        }

        // Tomar la fecha del Mes 
        $date = date("Y-m", strtotime($request->date));
        if ($date != '') {
            $where[] = ['date', 'like', $date.'%'];
        }

        $singleAttendance = EmployeeAttendance::with('user')->where($where)->get();
        if ($singleAttendance == true) {

            $data['allData'] = EmployeeAttendance::with('user')->where($where)->get();

            // dd($data['allData']->toArray());
            // array:3 [▼ // app/Http/Controllers/Backend/Report/AttendanceReportController.php:38
            // 0 => array:7 [▼
            //     "id" => 18
            //     "employee_id" => 25
            //     "date" => "2023-08-22"
            //     "attend_status" => "Presente"
            //     "created_at" => "2023-08-23T03:42:58.000000Z"
            //     "updated_at" => "2023-08-23T03:42:58.000000Z"
            //     "user" => array:25 [▶]
            // ]
            // 1 => array:7 [▼
            //     "id" => 42
            //     "employee_id" => 25
            //     "date" => "2023-08-21"
            //     "attend_status" => "Ausente"
            //     "created_at" => "2023-08-23T14:58:50.000000Z"
            //     "updated_at" => "2023-08-23T14:58:50.000000Z"
            //     "user" => array:25 [▶]
            // ]
            // 2 => array:7 [▼
            //     "id" => 48
            //     "employee_id" => 25
            //     "date" => "2023-08-15"
            //     "attend_status" => "Presente"
            //     "created_at" => "2023-08-23T17:08:52.000000Z"
            //     "updated_at" => "2023-08-23T17:08:52.000000Z"
            //     "user" => array:25 [▶]
            // ]
            // ]

            $data['absents'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status', 'Ausente')->get()->count();

            $data['leaves'] = EmployeeAttendance::with(['user'])->where($where)->where('attend_status', 'Permiso')->get()->count();

            $data['month'] = date("m-Y", strtotime($request->date));
            $data['fecha'] = date("d-m-Y", strtotime($request->date));

            $pdf = PDF::loadView('backend.report.attendance_report.attendance_report_pdf', $data);
            return $pdf->stream('documento.pdf');

        } else {
            
            // Desplegar notificación
            $notification = array(
                'message' => 'No hay datos con esta condición!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);

        }



    }



}
