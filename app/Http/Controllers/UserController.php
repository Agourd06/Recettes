<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'logname' => 'required',
            'logpassword' => 'required'


        ]);

        if (auth()->attempt(['name' => $data['logname'], 'password' => $data['logpassword']])) {

            $request->session()->regenerate();
            return redirect('/recettePage');

        }else{
            return redirect('/');

        }

    }
    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:16', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:16']


        ]);
        $data['password'] = bcrypt($data['password']);
        $user = User::Create($data);
        auth()->login($user);
        return redirect('/recettePage');
    }
}
