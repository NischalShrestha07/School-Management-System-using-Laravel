<?php

namespace App\Http\Controllers;

use App\Models\AssignSubjectToClass;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssignSubjectToClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();
        $classes = Classes::all();

        return view('admin.assignSubject.form', compact('classes', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required'

        ]);
        $class_id = $request->class_id;
        $subject_id = $request->subject_id;
        // dd($subject_id);
        foreach ($subject_id as $subject_id) {
            AssignSubjectToClass::updateOrCreate(
                [
                    'class_id' => $class_id,
                    'subject_id' => $subject_id
                ],
                [
                    'class_id' => $class_id,
                    'subject_id' => $subject_id

                ]
            );
        }
        return redirect()->route('assignSubject.read')->with('success', 'Subject Assigned to a Class Successfully.');
    }


    public function read(Request $request)
    {

        //relationship
        $query = AssignSubjectToClass::with(['class', 'subject'])->latest('id');
        //Filters the class from the table.
        if ($request->filled('class_id')) {
            $query->where('class_id', $request->get('class_id'));
        }
        $assignSubject = $query->get();


        $classes = Classes::all();

        // dd($assignSubject);
        return view('admin.assignSubject.table', compact('assignSubject', 'classes'));
    }


    public function edit($id)
    {
        $classes = Classes::all();

        $subjects = AssignSubjectToClass::find($id);

        return view('admin.assignSubject.editForm', compact('subjects', 'classes'));
    }


    public function update(Request $request)
    {
        //
    }
    public function delete($id)
    {
        $subjects = AssignSubjectToClass::find($id);
        $subjects->delete();

        return redirect()->route('assignSubject.read')->with('success', 'Assign Subject Deleted Successfully.');
    }
}
