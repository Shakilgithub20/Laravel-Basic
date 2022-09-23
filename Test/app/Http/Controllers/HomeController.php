<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    Public function dashboard(){
        return view('dashboard');
    }
    public function admin(){
        return view('admin');
    }
    public function student(){
        return view('student');
    }
}
