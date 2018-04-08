<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{
    

    public function mainPage()
    {
        
        return view('main-page');
    }

}
