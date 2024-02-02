<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    // public function totalUser(){

    //     $userCount = User::count();

    //     return view('recettepage' , ['countUser' => $userCount]);

    // }


    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
    public function login(Request $request)
    {
        
        $data = $request->validate(
            [
                'logname' => 'required',
                'logpassword' => 'required'


            ],
            [
                'logname.required' => 'Name is required for login',
                'logpassword.required' => 'Password is required for login'
            ]
        );

        if (auth()->attempt(['name' => $data['logname'], 'password' => $data['logpassword']])) {

           

            $request->session()->regenerate();
            return redirect('/recettePage');
        } else {
            return redirect('/')
                ->withErrors(['login' => 'Invalid credentials'])
                ->withInput();
        }
    }
    public function register(Request $request)
    {

        $data = $request->validate(
            [
                'name' => ['required', 'min:3', 'max:16', Rule::unique('users', 'name')],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'password' => ['required', 'min:3', 'max:16']


            ],
            [

                'name.required' => 'Name is required.',
                'name.min' => 'The name must have more than 3 characters.',
                'name.max' => 'The name must have less than 16 characters.',
                'name.unique' => 'This name is already taken.',
                'email.required' => 'The email is required.',
                'email.email' => 'Incorrect email structure.',
                'email.unique' => 'This email is already taken.',
                'password.min' => 'The password must have more than 3 characters.',
                'password.max' => 'The password must have less than 16 characters.',
                'password.required' => 'The password is required.',
            ]
        );
        $data['password'] = bcrypt($data['password']);
        $user = User::Create($data);
        auth()->login($user);
        return redirect('/recettePage');
    }
}
