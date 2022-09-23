<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function login(){
        if(Session::has('username')){
            return redirect()->to('dashboard');
        }
        return view('login');
    }
    public function loginstore(request $request){
        $email = $request -> email;
        $password = $request -> password;
        // echo 'email is ' .$email;
        // echo 'password is ' .$password;
        // perform a query to check if the user exists in the database
        $user = User::where('email', '=', $email)
        ->where('password', '=', $password)
        ->first(); //get returns an array, first returns the first object
        // dd($user);
        // echo $user->name;
        if($user){
        //    echo 'user exists';
           $name = $user->name;
           $role = $user->role;
           Session::put('username', $name);
           Session::put('userrole', $role);

        //    $name_session = Session::get('username');
        //    echo $name_session;
           return redirect()->to ('dashboard');
        }
        else{
            // echo 'user does not exist';
            return redirect()->back()->with('msg', 'Invalid Credentials');
        }
    }
    public function logout(){
        Session::flash('username');
        Session::flash('userrole');
        return redirect()->to('login');
    }
}
