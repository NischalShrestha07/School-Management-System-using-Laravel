<?php

namespace App\Http\Controllers;

use App\Models\FeeHead;
use Illuminate\Http\Request;

class FeeHeadController extends Controller
{
    public function index()
    {
        return view('admin.Feehead.feehead');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required'
        ]);
        $data = new FeeHead();
        $data->name = $request->name;
        $data->save();

        return redirect()->route('feehead.read')->with('success', 'Fee Head Added Successfully.');
    }

    public function read()
    {
        $feehead = FeeHead::all();
        return view('admin.Feehead.feehead_list', compact('feehead'));
    }
    public function edit($id)
    {
        $feehead = FeeHead::find($id);
        return view('admin.Feehead.edit_feehead', compact('feehead'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $feehead = FeeHead::find($id);
        if ($feehead) {
            $feehead->name = $request->name;
            $feehead->save();

            return redirect()->route('feehead.read')->with('Fee Head Updated Successfully.');
        }
        return redirect()->route('feehead.read')->with('success', 'Feed Head not Found.');
    }



    public function delete($id)
    {
        $feehead = FeeHead::find($id);
        $feehead->delete();

        return redirect()->route('feehead.read')->with('success', 'Fee Head Deleted Successfully');
    }
}
