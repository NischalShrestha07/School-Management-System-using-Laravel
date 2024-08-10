<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        // $announcement = Announcement::where('type', 'student')->latest()->limit(1)->get();
        //above limit(1) will only show one latest notice
        $announcement = Announcement::where('type', 'student')->latest()->get();        // dd($announcement);

        return view('student.dashboard', compact('announcement'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('student.login')->with('error', 'Logout Successfully.');
    }

    public function changePassword()
    {
        return view('student.changePassword');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
            //confirmPassword should mactch with newPassword

        ]);
        $oldPassword = $request->oldPassword;
        $newPassword = $request->newPassword;
        $user = User::find(Auth::user()->id); //find user
        // dd($user);

        if (Hash::check($oldPassword, $user->password)) { //checked wheather the password is correct or not

            $user->password = $newPassword;
            $user->update();
            return redirect()->back()->with('success', 'Password Changed Successfully.');
        } else {
            return redirect()->back()->with('error', 'Old Password Does not match.');
        }
    }
}
