<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // UserView
    public function UserView(){

        // $allData = User::all();
        // return view('backend.user.view_user', compact('allData'));

        // Otra forma de pasar datos es cargando un array
        $data['allData'] = User::all();
        return view('backend.user.view_user', $data);
    }



}
