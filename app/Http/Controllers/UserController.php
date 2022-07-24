<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
use App\Models\User;
use App\Models\Connections;
use App\Models\Subscription;
use App\Models\Friendship;
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
        $friendsArr = Auth::user()->friends->toArray();
        // return $friends;
        $friendsID = array_column($friendsArr, 'id');
        return view('user.home', compact('users', 'friendsID'));
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
        // return $id;
        Friendship::create([
            'first_user' => Auth::user()->id,
            'second_user' => $id,
            'acted_user' => Auth::user()->id,
            'status' => 'confirmed'
        ]);
        return back();
        // return view('user.subscription');
    }

    public function logout (Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
