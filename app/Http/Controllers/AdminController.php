<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Query;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    //
    public function users (){
        $users = User::where('id', '!=', Auth::user()->id)->paginate(5);
        return view('admin.users', compact('users'));
    }
    public function deleteUser ($id){
        return $id;
    }
    public function queries (){
        $query = Query::all();
        return view('admin.queries', compact('query'));
    }
    public function logout (Request $request){
        Auth::logout(); 
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
