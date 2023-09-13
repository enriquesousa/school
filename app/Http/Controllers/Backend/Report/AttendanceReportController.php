<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\EmployeeAttendance;


class AttendanceReportController extends Controller
{
    // AttendanceReportView
    public function AttendanceReportView(){
        $data['employees'] = User::where('usertype', 'Employee')->get();
        return view('backend.report.attendance_report.attendance_report_view', $data);
    }

    

}
