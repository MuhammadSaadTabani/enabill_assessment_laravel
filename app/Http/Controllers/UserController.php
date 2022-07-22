<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
use App\Models\User;
use App\Models\Connections;
use App\Models\Subscription;
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
        $users = User::whereNotIn('id',[Auth::user()->id, 1])->paginate(5);
        return view('user.home', compact('users'));
    }
    public function query(){

        $query = Query::where('user_id', Auth::user()->id)->get();
        return view('user.query')->with('query',$query);
    }
    public function subscription(){
        $subscription = Subscription::where('user_id',Auth::user()->id)->first();

        return view('user.subscription', compact('subscription'));
    }
    public function connect($id){
        Connections::create([
            'user_id' => Auth::user()->id,
            'connection_user_id' => $id
        ]);
        // return redirect
        // return view('user.subscription');
    }

    public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
