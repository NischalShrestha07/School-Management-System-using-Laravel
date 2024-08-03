<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Classes;
use App\Models\FeeHead;
use App\Models\FeeStructure;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class FeeStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();
        $academic_year = AcademicYear::all();
        $feehead = FeeHead::all();
        $feestructure = FeeStructure::all();
        return view('admin.FeeStructure.feestructure', compact('classes', 'academic_year', 'feehead', 'feestructure'));

        // the above/below method does the same task.

        // $data['classes'] = Classes::all();
        // $data['academic_year'] = AcademicYear::all();
        // $data['feehead'] = FeeHead::all();
        // return view('admin.FeeStructure.feestructure', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'academic_year_id' => 'required',
            'class_id' => 'required',
            'feehead_id' => 'required',
        ]);
        FeeStructure::create($request->all());
        return redirect()->route('feestructure.create')->with('success', 'Fee Structure added successfully.');
    }


    public function read(Request $request)
    {
        $feestructure = FeeStructure::with(['FeeHead', 'AcademicYear'])->latest()->get();
        // dd($data);
        return view('admin.FeeStructure.feestructure_list', compact('feestructure'));
    }
    public function delete($id)
    {
        $data = FeeStructure::find($id);
        $data->delete();
        return redirect()->route('feestructure.read')->with('success', 'Fee Structure Deleted Successfully.');
    }

    //want to go back to previous used interface 
    // return redirect()->back()->with('success','We are redirected to previous interface.');


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $feehead = FeeHead::all();
        $classes = Classes::all();
        $academic_year = AcademicYear::all();
        $feestructure = FeeStructure::find($id);
        return view("admin.feestructure.edit_feestructure", compact('feestructure', 'feehead', 'classes', 'academic_year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeeStructure $feeStructure)
    {
        //
    }
}
