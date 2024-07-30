<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    public function index()
    {
        return view('admin.academic_year');
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
        return redirect()->route('academic_year.create')->with('success', 'Academic Year added successfully.');
    }
    public function read()
    {
        $data['academic_year'] = AcademicYear::get();
        // dd($data);
        return view('admin.academic_year_list', $data);
    }
    public function delete($id)
    {
        $data = AcademicYear::find($id);
        $data->delete();
        return redirect()->route('academic_year.read')->with('success', 'Academic Year Added Successfully.');
    }


    public function edit($id)
    {
        $data['academic_year'] = AcademicYear::find($id);
        return view('admin.edit_academic_year', $data);
    }

    public function update(Request $request)
    {
        $data = AcademicYear::find($request->id);
        $data->name = $request->name;
        $data->update();

        return redirect()->route('academic_year.read')->with('success', 'Academic Year Updated Successfully.');
    }
}
