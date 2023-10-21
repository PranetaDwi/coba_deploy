<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function dashboard(){
        return view ('cv.dashboard');
    }

    public function about(){
        return view ('cv.about');
    }

    public function portfolio(){
        return view ('cv.portfolio');
    }

}
