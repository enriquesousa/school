<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

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

    // ProfileStore
    public function ProfileStore(Request $request){

        $id = Auth::user()->id;
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->gender = $request->gender;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/'.$data->image));    // Borra la imagen anterior
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image'] = $filename;
        }

        $data->save();

        // Desplegar notificación
        $notification = array(
            'message' => 'Perfil de Usuario Actualizado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('profile.view')->with($notification);

    }

    // PasswordView
    public function PasswordView(){
        return view('backend.user.edit_password');
    }

    // PasswordUpdate
    public function PasswordUpdate(Request $request){

        $validateData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword)) {
            $id = Auth::user()->id;
            $data = User::findOrFail($id);
            $data->password = Hash::make($request->password);
            $data->save();

            // Desplegar notificación
            $notification = array(
                'message' => 'Contraseña cambio con éxito!',
                'alert-type' => 'success'
            );

            Auth::logout();
            return redirect()->route('login')->with($notification);


        }else{

            // Desplegar notificación
            $notification = array(
                'message' => 'La Contraseña No Coincide!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }


}
