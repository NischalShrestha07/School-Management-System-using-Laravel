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

        return redirect()->route('academic_year.create')->with('success', 'Academic Year Added successfully.');
    }
    public function read()
    {
        $data['academic_year'] = AcademicYear::all();
        // dd($data);
        return view('admin.academic_year_list', $data);
    }
    public function delete($id)
    {
        $data = AcademicYear::find($id);
        $data->delete();
        return redirect()->route('academic_year.read')->with('success', 'Academic Year Deleted Successfully.');
    }


    public function edit($id)
    {
        $academic_year = AcademicYear::find($id);
        return view('admin.edit_academic_year', compact('academic_year'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $academic_year = AcademicYear::find($id);
        if ($academic_year) {
            $academic_year->name = $request->name;
            $academic_year->save();
            return redirect()->route('academic_year.read')->with('success', 'Academic Year Updated Successfully.');
        }

        return redirect()->route('academic_year.read')->with('error', 'Academic Year not found.');
    }
}
