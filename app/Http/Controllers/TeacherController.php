<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.teacher.form');
    }
    public function store(Request $request)
    {
        $request->validate([
            'teacher_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
    }
}
