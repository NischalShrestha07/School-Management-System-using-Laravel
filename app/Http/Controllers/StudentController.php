<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Classes;
use App\Models\FeeHead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class StudentController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        $academic_year = AcademicYear::all();
        $feehead = FeeHead::all();

        return view('admin.Student.student', compact('classes', 'academic_year', 'feehead'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'academic_year_id' => 'required',
            'class_id' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'admission_date' => 'required',
            'dob' => 'required',
            'mobno' => 'required',
            'email' => 'required',
            'password' => 'required',


        ]);
        $user = new User();
        $user->academic_year_id = $request->academic_year_id;
        $user->class_id = $request->class_id;
        $user->name = $request->name;
        $user->father_name = $request->father_name;
        $user->mother_name = $request->mother_name;
        $user->admission_date = $request->admission_date;
        $user->dob = $request->dob;
        $user->mobno = $request->mobno;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'student';
        $user->save();


        return redirect()->route('student.create')->with('success', 'Student Added Successfully.');
    }
    public function read(Request $request)
    {
        //studentClass is imported from the User Model which has class details 
        // dd($query); here to see this in browser just use the syntax and know that the return() uses doesnt effect anything.
        $query = User::with(['studentClass', 'studentAcademicYear'])->where('role', 'student')->latest('id');

        if ($request->filled('academic_year_id')) {
            $query->where('academic_year_id', $request->get('academic_year_id'));
        }

        if ($request->filled('class_id')) {
            $query->where('class_id', $request->get('class_id'));
        }
        //the above codes and FeeStructure controller codes are bit different are used for same task to filter the datas of the table.

        $students = $query->get();
        $classes = Classes::all();
        $academic_year = AcademicYear::all();



        return view('admin.student.student_list', compact('students', 'classes', 'academic_year'));
    }


    public function edit($id)
    {
        $students = User::find($id);
        return view('admin.student.edit_student', compact('students'));
    }
}
