<?php

namespace App\Http\Controllers\Backend\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;


class StudentRegController extends Controller
{

    // StudentRegistrationView
    public function StudentRegistrationView(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        // tomar por defecto la ultima clase y año registrado
        $data['year_id'] = StudentYear::orderBy('id', 'DESC')->first()->id;
        $data['class_id'] = StudentYear::orderBy('id', 'DESC')->first()->id;

        $data['allData'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();

        return view('backend.student.student_registration.student_view',$data);
    }

    // StudentRegistrationAdd
    public function StudentRegistrationAdd(){

        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        return view('backend.student.student_registration.student_add', $data);
    }

    // StudentRegistrationStore
    public function StudentRegistrationStore(Request $request){

        DB::transaction(function () use ($request) {

            $checkYear = StudentYear::find($request->year_id)->name;

            // Tomar el ultimo estudiante registrado!
            $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first();

            // Para generar el ID 'id_no' del Estudiante queda del tipo: ano+1, ejemplo: 20190001
            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } else {
                $student = User::where('usertype', 'Student')->orderBy('id', 'DESC')->first()->id;
                $studentId = $student + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }

            } // end else

            $final_id_no = $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();


            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();


            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });


        $notification = array(
            'message' => 'Estudiante Registrado con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.registration.view')->with($notification);
    }

    // StudentSearchYearClassWise
    public function StudentSearchYearClassWise(Request $request){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        // tomar los datos de búsqueda
        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;

        $data['allData'] = AssignStudent::where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();

        return view('backend.student.student_registration.student_view',$data);
    }

    // StudentRegistrationEdit
    public function StudentRegistrationEdit($student_id){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        // usar with(['student','discount']) para traer también todos los datos de las relaciones
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id', $student_id)->first();
        // dd($data['editData']->toArray());

        return view('backend.student.student_registration.student_edit', $data);
    }

    // StudentRegistrationUpdate
    public function StudentRegistrationUpdate(Request $request, $student_id){

        DB::transaction(function () use ($request, $student_id) {

            $user = User::where('id', $student_id)->first();

            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/'.$user->image));    // Borra la imagen anterior
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();


            $assign_student = AssignStudent::where('id',$request->id)->where('student_id', $student_id)->first();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();


            $discount_student = DiscountStudent::where('assign_student_id',$request->id)->first();
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });


        $notification = array(
            'message' => 'Registrado de Estudiante Actualizado con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.registration.view')->with($notification);
    }

    // StudentRegistrationPromotion
    public function StudentRegistrationPromotion($student_id){
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        // usar with(['student','discount']) para traer también todos los datos de las relaciones
        $data['editData'] = AssignStudent::with(['student','discount'])->where('student_id', $student_id)->first();
        // dd($data['editData']->toArray());

        return view('backend.student.student_registration.student_promotion', $data);
    }

    // StudentRegistrationPromotionUpdate
    public function StudentRegistrationPromotionUpdate(Request $request, $student_id){

        DB::transaction(function () use ($request, $student_id) {

            $user = User::where('id', $student_id)->first();

            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/'.$user->image));    // Borra la imagen anterior
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            // Crear nuevo registro, para agregar al estudiante una nueva: clase, ano, grupo y turno
            $assign_student = new AssignStudent();
            $assign_student->student_id = $student_id;
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            // Crear nuevo registro, para agregar al estudiante nuevo discount
            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();

        });


        $notification = array(
            'message' => 'Promoción del Estudiante Actualizado con éxito',
            'alert-type' => 'success'
        );

        return redirect()->route('student.registration.view')->with($notification);
    }

    // StudentRegistrationDetails
    public function StudentRegistrationDetails($student_id){

        $data['details'] = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();

        $pdf = PDF::loadView('backend.student.student_registration.student_details_pdf', $data);
        // return $pdf->download('detalles.pdf');
        return $pdf->stream('detalles.pdf');

    }



}
