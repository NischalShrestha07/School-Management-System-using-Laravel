<?php

namespace App\Http\Controllers;

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
        return view('admin.FeeStructure.feestructure');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('admin.FeeStructure.feestructure_list');
    }

    /**
     * Display the specified resource.
     */
    public function read(Request $request)
    {
        // $feestructure = FeeStructure::all();
        // return view('admin.FeeStructure.feestructure_list', compact('feestructure'));
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
