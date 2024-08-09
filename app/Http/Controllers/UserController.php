<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('student.login');
    }
    public function authenticate(Request $request)
    {

        // echo $request->email;
        // echo $request->password; 
        // this shows the email and password inputed and the route is properly working or not.

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // echo "Welcome " . Auth::user()->name;
            if (Auth::user()->role != 'student') {
                Auth::logout();
                return redirect()->route('student.login')->with('error', 'Unauthorized User. Access Denied.');
            }
            return redirect()->route('student.dashboard');
        } else {
            return redirect()->route('student.login')->with('error', 'Something went wrong.');
        }
    }


    public function dashboard()
    {
        return view('student.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('student.login')->with('error', 'Logout Successfully.');
    }
}
