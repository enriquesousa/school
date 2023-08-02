<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AssignSubject;
use App\Models\StudentClass;
use App\Models\SchoolSubject;


class AssignSubjectController extends Controller
{
    // AssignSubjectView
    public function AssignSubjectView(){
        $data['allData'] = AssignSubject::all();
        //$data['allData'] = AssignSubject::select('fee_category_id')->groupBy('fee_category_id')->get();
       return view('backend.setup.assign_subject.view_assign_subject', $data);
    }

    // AssignSubjectAdd
    public function AssignSubjectAdd(){
        $data['subjects'] = SchoolSubject::all();
        $data['classes'] = StudentClass::all();

        return view('backend.setup.assign_subject.add_assign_subject', $data);
    }




}
