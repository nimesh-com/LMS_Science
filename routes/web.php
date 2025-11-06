<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollCourseController;
use App\Http\Controllers\StudentController;

/* Guest */

Route::get('/', [DashboardController::class, 'index'])->name('home');

/* after login show dashboard */
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

/* Profile */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*Register Student Route */
Route::middleware(['auth', 'verified', 'role:student'])->group(function () {

    /* Student */
    Route::resource('student', StudentController::class);
    Route::get('/student-dashboard', [StudentController::class, 'index'])->name('student.dashboard');

    /* Course Enroll */
    Route::resource('enroll', EnrollCourseController::class);
    Route::get('/enroll-course/{course}', [EnrollCourseController::class, 'enrollCourse'])->name('enroll');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
