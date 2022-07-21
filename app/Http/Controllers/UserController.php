<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Query;
use Auth;

class UserController extends Controller
{
    //
    public function query (Request $request){
        $request['user_id'] = Auth::user()->id;
        Query::create($request->all());
        return back();
    }
}
