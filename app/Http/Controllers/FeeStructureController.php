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
        //fiters the searching of the details according to class and academic_year.
        $query = FeeStructure::query();
        if ($request->has('class_id') && $request->class_id != '') {
            $query->where('class_id', $request->class_id);
        }
        if ($request->has('academic_year_id') && $request->academic_year_id != '') {
            $query->where('academic_year_id', $request->academic_year_id);
        }
        if ($request->has('feehead_id') && $request->feehead_id != '') {
            $query->where('feehead_id', $request->feehead_id);
        }


        // $feestructure = FeeStructure::with(['FeeHead', 'AcademicYear', 'Classes'])->latest()->get();
        $feestructure = $query->with('FeeHead', 'AcademicYear', 'Classes')->latest()->get();

        // dd($data);
        $classes = Classes::all();
        $academic_year = AcademicYear::all();
        $feehead = FeeHead::all();

        return view('admin.FeeStructure.feestructure_list', compact('feestructure', 'academic_year', 'classes', 'feehead'));
    }
    public function delete($id)
    {
        $data = FeeStructure::find($id);
        $data->delete();
        return redirect()->route('feestructure.read')->with('success', 'Fee Structure Deleted Successfully.');
    }

    //want to go back to previous used interface 
    // return redirect()->back()->with('success','We are redirected to previous interface.');



    public function edit($id)
    {
        $feehead = FeeHead::all();
        $classes = Classes::all();
        $academic_year = AcademicYear::all();

        // $feestructure = FeeStructure::find($id);
        $data = FeeStructure::find($id);
        return view("admin.feestructure.edit_feestructure", compact('data', 'feehead', 'classes', 'academic_year'));
    }

    public function update(Request $request,  $id)
    {
        $fee = FeeStructure::find($id);
        $fee->class_id = $request->class_id;
        $fee->academic_year_id = $request->academic_year_id;
        $fee->feehead_id = $request->feehead_id;
        $fee->april = $request->april;
        $fee->may = $request->may;
        $fee->june = $request->june;
        $fee->july = $request->july;
        $fee->august = $request->august;
        $fee->september = $request->september;
        $fee->october = $request->october;
        $fee->november = $request->november;
        $fee->december = $request->december;
        $fee->january = $request->january;
        $fee->february = $request->february;
        $fee->march = $request->march;
        $fee->update();

        return redirect()->route('feestructure.read')->with('success', 'Fee Structure Updated Successfully.');
    }
}
