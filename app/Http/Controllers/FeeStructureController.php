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
        $data['classes'] = Classes::all();
        $data['academic_year'] = AcademicYear::all();
        $data['feehead'] = FeeHead::all();

        return view('admin.FeeStructure.feestructure');
    }

    public function store(Request $request)
    {
        $feestructure = new FeeStructure();

        return view('admin.FeeStructure.feestructure_list');
    }


    public function read(Request $request)
    {
        $feestructure = FeeStructure::all();
        return view('admin.FeeStructure.feestructure_list', compact('feestructure'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeeStructure $feeStructure)
    {

        //validate is not written
        // $feestructure = FeeStructure::find($id);
        // if ($feestructure) {
        //     // $feestructure->name
        // }
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
