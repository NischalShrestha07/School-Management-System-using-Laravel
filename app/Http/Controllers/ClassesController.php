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
        return view('admin.class.class_list', $data);
    }
    public function edit($id)
    {
        $data['class'] = Classes::find($id);
        return view('admin.class.edit_class', $data);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $class = Classes::find($id);
        if ($class) {
            $class->name = $request->name;
            $class->save();

            return redirect()->route('class.read')->with('success', 'Class added successfully.');
        }
        return redirect()->route('class.read')->with('error', 'Class not found.');
    }
    public function delete($id)
    {
        $data = Classes::find($id);
        $data->delete();

        return redirect()->route('class.read')->with('success', 'Class Deleted successfully.');
    }
}
