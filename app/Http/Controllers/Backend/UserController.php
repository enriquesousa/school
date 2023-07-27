<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // UserView
    public function UserView()
    {

        // $allData = User::all();
        // return view('backend.user.view_user', compact('allData'));

        // Otra forma de pasar datos es cargando un array
        $data['allData'] = User::all();
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
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();

        // aquí va el mensaje de toster para avisar que ya se grabo a base de datos

        return redirect()->route('user.view');

    }



}
