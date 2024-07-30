<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }

    public function authenticate(Request $req)
    {
        //checks the required data and sends the error message tologin i not filled.
        $req->validate([
            'email' => 'required',
            'password' => 'required'

        ]);
        // dd($req->all());
        if (Auth::guard('admin')->attempt(['email' => $req->email, 'password' => $req->password])) {
            if (Auth::guard('admin')->user()->role != 'admin') {
                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', 'Unauthorized user. Access Denied.');
            }
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('error', 'Something went wrong');
        }
    }
    public function register()
    {
        // $user = new User();
        // $user->name = 'Narayan';
        // $user->role = 'student';
        // $user->email = 'narayan@gmail.com';
        // $user->password = Hash::make('admin');
        // $user->save(); // if not written then it will not show details in Database.
        // return redirect()->route('admin.login')->with('success', 'User created successfully.');

        $user = new User();
        $user->name = 'Admin';
        $user->role = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('admin');
        $user->save(); // if not written then it will not show details in Database.
        return redirect()->route('admin.login')->with('success', 'User created successfully.');
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function form()
    {
        return view('admin.form');
    }
    public function table()
    {
        return view('admin.table');
    }
}
