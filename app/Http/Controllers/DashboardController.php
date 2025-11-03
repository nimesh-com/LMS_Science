<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Module;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $Course = Course::all();
        return view('frontend.index', compact('Course'));
    }

    public function showDashboard(Request $request)
    {

        $user = $request->user();
        $Modules = Module::all();

        $Course = Course::count();

        $test = "hello";

        switch ($user->role) {
            case 'admin':
                return view('backend.index', compact('Modules', 'Course'));
            case 'student':
                return redirect()->route('guest');
            default:
                abort(403, 'Unauthorized action.');
        }
    }
}
