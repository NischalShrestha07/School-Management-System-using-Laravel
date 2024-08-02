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
        // $feestructure = FeeStructure::all();
        // return view('admin.FeeStructure.feestructure_list', compact('feestructure'));

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
        $feestructure = FeeStructure::all();
        return view('admin.FeeStructure.feestructure_list', compact('feestructure'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeeStructure $feeStructure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeStructure $feeStructure)
    {
        //
    }
}
