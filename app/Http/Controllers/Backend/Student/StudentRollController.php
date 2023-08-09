<?php

namespace App\Http\Controllers\Backend\Student;

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


class StudentRollController extends Controller
{
    // StudentRoleView
    public function StudentRollView(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        return view('backend.student.roll_generate.roll_generate_view',$data);
    }

    // GetStudents
    public function GetStudents(Request $request){
        // dd('ok done'); //http://school.test/students/reg/getstudents?year_id=2&class_id=1  con network podemos ver esto que si pasa los parámetros

        $allData = AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();

        // dd($allData->toArray());
        /* Si inspeccionamos con network y vemos su response al dar click en botón de buscar por cierto ano y clase
            Obtenemos los siguientes datos

        array:2 [ // app/Http/Controllers/Backend/Student/StudentRollController.php:36
            0 => array:10 [
              "id" => 8
              "student_id" => 11
              "roll" => null
              "class_id" => 1
              "year_id" => 1
              "group_id" => 1
              "shift_id" => 3
              "created_at" => "2023-08-06T01:44:46.000000Z"
              "updated_at" => "2023-08-06T01:44:46.000000Z"
              "student" => array:25 [
                "id" => 11
                "usertype" => "Student"
                "name" => "Dennis Pace"
                "email" => null
                "email_verified_at" => null
                "mobile" => "(456) 666-6666"
                "address" => "Deleniti consequat. ."
                "gender" => "Female"
                "image" => "20230806014488.jpg"
                "fname" => "Ronan Bullock"
                "mname" => "Kareem Romero"
                "religion" => "ateo"
                "id_no" => "20190011"
                "dob" => "1975-07-22"
                "code" => "3417"
                "role" => null
                "join_date" => null
                "designation_id" => null
                "salary" => null
                "status" => 1
                "current_team_id" => null
                "profile_photo_path" => null
                "created_at" => "2023-08-06T01:44:46.000000Z"
                "updated_at" => "2023-08-06T01:44:46.000000Z"
                "profile_photo_url" => "https://ui-avatars.com/api/?name=D+P&color=7F9CF5&background=EBF4FF"
              ]
            ]
            1 => array:10 [
              "id" => 9
              "student_id" => 12
              "roll" => null
              "class_id" => 1
              "year_id" => 1
              "group_id" => 3
              "shift_id" => 2
              "created_at" => "2023-08-06T01:45:11.000000Z"
              "updated_at" => "2023-08-08T03:36:27.000000Z"
              "student" => array:25 [
                "id" => 12
                "usertype" => "Student"
                "name" => "Dana Wiley"
                "email" => null
                "email_verified_at" => null
                "mobile" => "(233) 333-3333"
                "address" => "Error impedit, aliqu."
                "gender" => "Female"
                "image" => "20230806014582.jpg"
                "fname" => "Brenden Buckner"
                "mname" => "Michael Gutierrez"
                "religion" => "ateo"
                "id_no" => "20190012"
                "dob" => "1995-12-23"
                "code" => "5458"
                "role" => null
                "join_date" => null
                "designation_id" => null
                "salary" => null
                "status" => 1
                "current_team_id" => null
                "profile_photo_path" => null
                "created_at" => "2023-08-06T01:45:11.000000Z"
                "updated_at" => "2023-08-06T01:45:11.000000Z"
                "profile_photo_url" => "https://ui-avatars.com/api/?name=D+W&color=7F9CF5&background=EBF4FF"
              ]
            ]
          ] */


        // pasamos el array como json data, (key,value) pair
        return response()->json($allData);
    }


}
