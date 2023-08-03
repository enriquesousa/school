<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;



class UserController extends Controller
{
    // UserView
    public function UserView()
    {

        // $allData = User::all();
        // return view('backend.user.view_user', compact('allData'));

        // Otra forma de pasar datos es cargando un array
        $data['allData'] = User::where('usertype','Admin')->get();
        return view('backend.user.view_user', $data);
    }

    // UserAdd
    public function UserAdd()
    {
        return view('backend.user.add_user');
    }

    // UserStore
    public function UserStore(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data = new User();
        $code = rand(0000, 9999);
        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($code);
        $data->code = $code;
        $data->save();

        // aquí va el mensaje de toaster para avisar que ya se grabo a base de datos
        $notification = array(
            'message' => 'Usuario agregado con éxito!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($notification);


    }

    // UserEdit
    public function UserEdit($id){
        $editData = User::findOrFail($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    // UserUpdate
    public function UserUpdate(Request $request, $id){

        $validateData = $request->validate([
            'email' => [
                'required',
                Rule::unique('users')->ignore($request->target_user_id),
            ],
            'name' => 'required',
        ]);

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;
        $data->save();

        // aquí va el mensaje de toaster para avisar que ya se grabo a base de datos
        $notification = array(
            'message' => 'Usuario actualizado con éxito!',
            'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);

    }

    // UserDelete
    public function UserDelete($id){

        $data = User::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Usuario eliminado con éxito!',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }



}
