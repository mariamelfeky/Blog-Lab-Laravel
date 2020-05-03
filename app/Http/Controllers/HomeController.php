<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones= \App\Phone::where('user_id',\Auth::id())->get();
        $user = Auth::user();
        return view('home',['phones'=> $phones, 'user'=> $user]);
    }
}
