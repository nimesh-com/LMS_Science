<?php

namespace App\Http\Controllers;

use App\Models\TutorClass;
use Illuminate\Http\Request;

class TutorClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = TutorClass::all();
        return view('backend.onlinecls.class-manage', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.onlinecls.create-class');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'scheduled_at' => 'required',
            'scheduled_date' => 'required|date',
        ]);

        // Handle file upload if thumbnail is provided
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Onlineclass/thumbnails'), $filename);
            $validatedData['thumbnail'] = 'thumbnails/' . $filename;
        }

        TutorClass::create($validatedData);

        return redirect()->route('classes')->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TutorClass $tutorClass) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TutorClass $class)
    {
        $class = TutorClass::findOrFail($class->id);
        return view('backend.onlinecls.class-edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TutorClass $class)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'scheduled_at' => 'required',
            'scheduled_date' => 'required|date',
        ]);

        // Handle thumbnail upload
        if ($request->hasFile('thumbnail')) {
            // Delete old file if exists
            if ($class->thumbnail && file_exists(public_path($class->thumbnail))) {
                unlink(public_path($class->thumbnail));
            }

            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('Onlineclass/thumbnails'), $filename);
            $validatedData['thumbnail'] = 'Onlineclass/thumbnails/' . $filename;
        } else {
            // Keep old thumbnail if none uploaded
            $validatedData['thumbnail'] = $class->thumbnail;
        }

        // Update database record
        $class->update($validatedData);

        return redirect()->route('classes')->with('success', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TutorClass $class)
    {
        // Delete thumbnail file if exists
        if ($class->thumbnail && file_exists(public_path($class->thumbnail))) {
            unlink(public_path($class->thumbnail));
        }

        $class->delete();

        return redirect()->route('classes')->with('success', 'Class deleted successfully.');
    }

  public function status(TutorClass $class)
{
    $class->status = $class->status== 1 ? 0 : 1;
    $class->update(['status' => $class->status]);

    return redirect()->route('classes')->with('success', 'Class status updated successfully.');
}

}
