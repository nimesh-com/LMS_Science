<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $Modules = Module::all();

        switch ($user->role) {
            case 'admin':
                return view('backend.index', compact('Modules'));
            case 'student':
                return view('frontend.index');
            default:
              abort(403, 'Unauthorized action.');
        }
    }
}
