<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
use Auth;

class UserController extends Controller
{
    //
    public function postQuery (Request $request){
        $request['user_id'] = Auth::user()->id;
        Query::create($request->all());
        return back()->with('SUCCESS','Query Submitted');;
    }
    public function home(){
        return view('user.home');
    }
    public function query(){
        return view('user.query');
    }
    public function subscription(){
        return view('user.subscription');
    }

    public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
