<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Classes;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        $academic_year = AcademicYear::all();

        return view('admin.Student.student', compact('classes', 'academic_year'));
    }
    public function store(Request $request)
    {
        echo 'oeky';
    }
}
