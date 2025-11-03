<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollCourseController;
use App\Http\Controllers\StudentController;


Route::get('/', [DashboardController::class, 'index'])->name('guest');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */


Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* Course Enroll */
    Route::resource('enroll', EnrollCourseController::class);
    Route::get('/enroll-course/{course}', [EnrollCourseController::class, 'enrollCourse'])->name('enroll');
});

Route::middleware('auth')->group(function () {
    Route::resource('student', StudentController::class);
});
Route::get('/student-dashboard', [StudentController::class, 'index'])->name('student.dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
