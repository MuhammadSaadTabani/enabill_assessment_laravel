<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use Hash;
use Session;
use DB;
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
                
                return redirect('admin/users')
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
        // dd($request->all());
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'firstname.required' => 'First Name field is required.',
            'lastname.required' => 'Last Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.'
        ]);

        DB::beginTransaction();

        try {
            //code...
            $request['type'] = 'user';
            // return $request->all();
            $request['password'] = Hash::make($request->password);
            $user = User::create($request->all());
            DB::commit();
            if(isset($request->subscriptionCheckbox)){
                Subscription::create([
                    'user_id' => $user->id,
                    'period' => $request->subscription,
                ]);
                DB::commit();
            }
            return redirect("/")->with('SUCCESS','Registered Successfully');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            DB::rollback();
            return redirect("/register")->with('ERROR',$th);
        }
       

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
    
}
