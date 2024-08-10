<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('admin.announcement.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'notice' => 'required',
            'type' => 'required',
        ]);
        $announcement = new Announcement();
        $announcement->notice = $request->notice;
        $announcement->type = $request->type;
        $announcement->save();


        return redirect()->route('announcement.create')->with('success', 'Announcements Added Successfully.');
    }


    public function read()
    {
        $announcement = Announcement::latest()->get();
        return view('admin.announcement.list', compact('announcement'));
    }

    public function edit($id)
    {
        $announcement = Announcement::find($id);
        return view('admin.announcement.editForm', compact('announcement'));
        // dd($announcement);
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcement::find($id);
        $announcement->notice = $request->notice;
        $announcement->type = $request->type;
        $announcement->update();

        return redirect()->route('announcement.read')->with('success', 'Announcement Updated Successfully.');
    }

    public function delete($id)
    {
        $announcement = Announcement::find($id);
        $announcement->delete();

        return redirect()->route('announcement.read')->with('success', 'Announcement Deleted Successfully.');
    }
}
