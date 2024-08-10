<?php

namespace App\Http\Controllers;

use App\Models\Announcment;
use Illuminate\Http\Request;

class AnnouncmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.announcement.form');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcment $announcment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcment $announcment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Announcment $announcment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcment $announcment)
    {
        //
    }
}
