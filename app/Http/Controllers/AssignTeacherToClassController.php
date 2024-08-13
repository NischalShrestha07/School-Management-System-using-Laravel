<?php

namespace App\Http\Controllers;

use App\Models\AssignTeacherToClass;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class AssignTeacherToClassController extends Controller
{

    public function index()
    {
        $classes = Classes::all();
        $teachers = User::where('role', 'teacher')->latest()->get();
        $subjects = Subject::all();

        return view('admin.AssignTeacher.form', compact('classes', 'teachers', 'subjects'));
    }


    public function findSubject(Request $request)
    {
        $class_id = $request->class_id;
        $subjects = AssignTeacherToClass::where('class_id', $class_id)->get();
        return response()->json([
            'status' => true,
            'subjects' => $subjects
        ]);
    }


    public function store(Request $request)
    {
        //
    }


    public function edit(AssignTeacherToClass $assignTeacherToClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AssignTeacherToClass $assignTeacherToClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AssignTeacherToClass $assignTeacherToClass)
    {
        //
    }
}
