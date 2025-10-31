<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\User;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.courses.view-course', [
            'Courses' => Course::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Instructors = User::where('role', 'admin')->get();
        return view('backend.courses.create-course', compact('Instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'teacher_id' => 'required|exists:users,id',
        ]);


        $validatedData['grade_id'] = 5;


        if ($request->hasFile('thumbnail')) {
            $imageName = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('course/thumbnails'), $imageName);
            $validatedData['thumbnail'] = 'course/thumbnails/' . $imageName;
        }


        Course::create($validatedData);
        return redirect(route('course-manage'))->with('success', 'Course created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
