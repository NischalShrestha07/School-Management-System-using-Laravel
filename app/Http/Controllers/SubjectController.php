<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subject.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->save();

        return redirect()->route('subject.create')->with('success', 'Subject Added Successfully.');
    }


    public function read()
    {
        $subjects = Subject::all();
        // dd($subjects);
        return view('admin.subject.table', compact('subjects'));
    }

    public function edit(Request $request, $id)
    {
        $subjects = Subject::find($id);
        return view('admin.subject.editSubject', compact('subjects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $subjects = Subject::find($id);
        $subjects->name = $request->name;
        $subjects->type = $request->type;
        $subjects->update();

        return redirect()->route('subject.read')->with('success', 'Subject Updated Successfully.');
    }
    public function delete($id)
    {
        $subjects = Subject::find($id);
        $subjects->delete();
        return redirect()->route('subject.read')->with('success', 'Subject Deleted Successfully.');
    }
}
