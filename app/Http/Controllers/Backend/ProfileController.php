<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    // ProfileView
    public function ProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.user.view_profile', compact('user'));
    }


}
