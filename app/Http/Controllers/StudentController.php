<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Classes;
use App\Models\FeeHead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        $academic_year = AcademicYear::all();
        $feehead = FeeHead::all();

        return view('admin.Student.student', compact('classes', 'academic_year', 'feehead'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'academic_year_id' => 'required',
            'class_id' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'admission_date' => 'required',
            'dob' => 'required',
            'mobno' => 'required',
            'email' => 'required',
            'password' => 'required',


        ]);
        $user = new User();
        $user->academic_year_id = $request->academic_year_id;
        $user->class_id = $request->class_id;
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->admission_date = $request->admission_date;
        $user->dob = $request->dob;
        $user->mobno = $request->mobno;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'student';
        $user->save();


        return redirect()->route('student.create')->with('success', 'Student Added Successfully.');
    }
}
