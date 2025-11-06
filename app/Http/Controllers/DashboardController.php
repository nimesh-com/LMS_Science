<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Module;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $Course = Course::all();/* Get all courses show student dashboard */
        return view('frontend.index', compact('Course'));
    }

    public function showDashboard(Request $request)
    {

        $user = $request->user(); /* Get the authenticated user */
        switch ($user->role) {
            case 'admin':
                $Modules = Module::all();/* Get all modules show admin dashboard */
                $Course = Course::count();/* Get all courses count show admin dashboard */
                return view('backend.index', compact('Modules', 'Course'));
            case 'student':
                $Course = Course::all();/* Get all courses show student dashboard */
                return view('frontend.index', compact('Course'));
            default:
                abort(403, 'Unauthorized action.');
        }
    }
}
