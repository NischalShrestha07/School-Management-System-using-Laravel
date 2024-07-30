<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        return view('admin.academic-year');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);
        $data = new AcademicYear();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('academic-year.create')->with('success', 'Academic Year added successfully.');
    }
}
