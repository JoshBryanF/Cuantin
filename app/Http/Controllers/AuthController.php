<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function login(Request $req){
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])){

            if($req->remember){
                Cookie::queue('remember_token', Auth::user()->getRememberToken(), 120);
            }

            Session::put('user_data', Auth::user());

            return redirect('/');
        }
        return redirect()->back()->withErrors([
            'login' => 'Invalid Credentials',
        ])->onlyInput('email');
    }

    public function loginpage(){
        return view('login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function registerpage(){
        return view('register');
    }

    public function register(Request $req){
        $rules = [
            'name' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|alpha_num|same:passwordcheck',
            'passwordcheck' => 'required|string',

        ];

        $message = [
            'password.same' => 'The password field confirmation does not match',
            'passwordcheck.required' => 'The password confirmation field is required',
            'email.unique' => 'Email is already registered'
        ];

        $validator = Validator::make($req->all(), $rules, $message);

        if($validator->fails()){
            return back()->withErrors($validator);
        }
        $user = new User();
        $user->name = $req->name;
        $user->password = $req->password;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $user->role = 'customer';
        $user->image = 'storage/profile_image/default.jpg';
        $user->save();
        Auth::login($user);
        return redirect('/')->with('success', 'Register Success');;
    }
}
