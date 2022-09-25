<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function index()
    {
        return view('websites.pages.index');
    }
    public function dashboard()
    {
        return view('websites.pages.dashboard');
    }

    
}
