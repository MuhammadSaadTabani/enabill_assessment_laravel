<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Query;

use Illuminate\Http\Request;
use Auth;
use Hash;

class AdminController extends Controller
{
    //
    public function users (){
        $users = User::where('id', '!=', Auth::user()->id)->paginate(5);
        return view('admin.users', compact('users'));
    }
    public function deleteUser ($id){
        // return $id;
        $user = User::find($id);
        $user->delete();
        return back();
    }
    public function queries (){
        $query = Query::with('user')->get();
        // return $query;
        return view('admin.queries', compact('query'));
    }
    public function updateQueryStatus ($id) {

    }
    public function addUser (Request $request) {
        $validatedData = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'fname.required' => 'First Name field is required.',
            'lname.required' => 'Last Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.'
        ]);
        User::create([
            'firstname' => $request->fname,
            'lastname' => $request->lname,
            'password' =>  Hash::make($request->password),
            'type' => 'user',
            'email' => $request->email,
        ]);

        return back()->with('SUCCESS', 'User Added Successfully');
    }
    public function logout (Request $request){
        Auth::logout(); 
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
