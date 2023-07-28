<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    // Para que Laravel redirects to home page si la sesión ya expiro.
    // Esto hay que ponerlo en cada controlador donde utilicemos auth.
    public function __construct(){
        $this->middleware('auth');
    }

    // ProfileView
    public function ProfileView(){
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.user.view_profile', compact('user'));
    }

    // ProfileEdit
    public function ProfileEdit(){
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('backend.user.edit_profile', compact('editData'));
    }

    // ProfileAdvanceForm
    public function ProfileAdvanceForm(){
       return view('backend.user.advance_form');
    }


}
