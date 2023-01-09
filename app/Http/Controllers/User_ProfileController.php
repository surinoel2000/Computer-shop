<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User_ProfileController extends Controller
{

 public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_profile($id){

        $users = DB::table('users')
        ->select('users.*')->where('users.id',$id)->get();
        return view('frontend.user_profile',[
            'users' => $users
        ]);
    }
}
