<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   var  $user,$role = "";
    public function __construct()
    {
        $this->middleware('auth');
        // $user = Auth::user();
        // $role = Auth::role();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // if( $role == 'admin'){

        //     return view('deshboard-Admin');
        // }
        // if($role == 'user'){

        //     
        // }
        return view('Deshboard.deshboard-Admin');
        
    }

    
    public function deshboardUser()
    {
        
        // return view('Deshboard.deshboard-user');
        return view('main-page');
    }



   
}
