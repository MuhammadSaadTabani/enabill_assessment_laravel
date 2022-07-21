<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login(){
        return view('login');
    }
    public function postLogin (Request $request) {
        // return $request->all();
        
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            
            if(Auth::user()->type == "admin")
                
                return redirect('admin/dashboard')
                        // ->intended('dashboard')
                        ->with('SUCCESS','Signed in');
            
            return redirect('user/home')
                        // ->intended('dashboard')
                        ->with('SUCCESS','Signed in');
        }
        return redirect("/")->with('ERROR','Login details are not valid');
    }
    public function register (){
        return view('register');
    }
    public function postRegister (Request $request) {
        $request['type'] = 'user';
        $request['password'] = Hash::make($request->password);
        $user = User::create($request->all());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
    
}
