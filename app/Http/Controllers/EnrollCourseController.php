<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\EnrollCourse;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        $course = Course::findOrFail($request->course_id);
        $student_id = Auth::user()->id;

        $valdidated = $request->validate([
            'reference_number' => 'required|string|max:255',
            'payment_receipt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('payment_receipt')) {
            $imageName = time().'.'.$request->payment_receipt->extension();
            $request->payment_receipt->move(public_path('uploads/payments'), $imageName);
            $valdidated['payment_receipt'] = 'uploads/payments/' . $imageName;
        }

        EnrollCourse::create([
            'course_id' => $course->id,
            'student_id' => $student_id,
        ]);

        Payment::create([
            'student_id' => $student_id,
            'amount' => $course->price,
            'reference_number' => $valdidated['reference_number'],
            'receipt' => $valdidated['payment_receipt'],
        ]);

        return redirect(route('guest'))->with('success', 'You have successfully enrolled in the course.');

    }

    /**
     * Display the specified resource.
     */
    public function show(EnrollCourse $enrollCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EnrollCourse $enrollCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EnrollCourse $enrollCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnrollCourse $enrollCourse)
    {
        //
    }

    /**
     * Enroll in a course.
     */
    public function enrollCourse($courseId)
    {
      $course = Course::findOrFail($courseId);

      return view('frontend.enroll', compact('course'));
    }
}
