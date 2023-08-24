<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AssignSubject;
use Illuminate\Http\Request;

class DefaultController extends Controller
{
    // GetSubject
    public function GetSubject(Request $request){
        $class_id = $request->class_id;
        $allData = AssignSubject::with(['school_subject'])->where('class_id', $class_id)->get();
        return response()->json($allData);
    }




}
