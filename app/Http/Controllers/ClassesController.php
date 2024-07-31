<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        return view('admin.class.class'); //its fetching the blade file inside the class folder in view.
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required'
        ]);
        $data = new Classes();
        $data->name = $request->name;
        $data->save();
        return redirect()->route('class.create')->with('success', 'Class added successfully.');
    }
    public function read()
    {
        $data['class'] = Classes::get();
        // dd($data);
        return view('admin.class.class.list', $data);
    }
}
