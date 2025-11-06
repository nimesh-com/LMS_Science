<?php

namespace App\Http\Controllers;

use App\Models\EnrollCourse;
use Illuminate\Http\Request;

class EnrollManageController extends Controller
{
public function index()
    {
        $enrollments = EnrollCourse::with('payments')->get();
        return view('backend.enroll.enroll-list', compact('enrollments'));
    }


    public function show($id)
    {
        $enrollment = EnrollCourse::with('payments')->findOrFail($id);
        return view('backend.enroll.show-enroll', compact('enrollment'));
    }
}
