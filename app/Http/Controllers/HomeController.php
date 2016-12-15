<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Auth::user();
        
        return view('home', compact('user'));
    }
    
    public function logout() {
        Auth::logout();
        
        return redirect('/login');
    }
}
