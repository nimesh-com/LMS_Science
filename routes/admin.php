<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollManageController;
use App\Http\Controllers\TutorClassController;
use App\Models\TutorClass;
use App\Http\Controllers\DashboardController;

Route::prefix('admin')->middleware(['auth', 'verified', 'role:admin'])->group(function () {

    /* Manage Modules */
    Route::resource('/modules', ModuleController::class);
    Route::get('/modules', [ModuleController::class, 'index'])->name('modules');

    /* Manage Courses */
    Route::resource('/courses', CourseController::class);
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');

    /* Manage Enrollments */
    Route::resource('/enrollments', EnrollManageController::class);
    Route::get('/enrollments', [EnrollManageController::class, 'index'])->name('enrollments');

    /* Manage Classes */
    Route::resource('/classes', TutorClassController::class);
    Route::get('/classes', [TutorClassController::class, 'index'])->name('classes');
    Route::put('/classes/{class}/status', [TutorClassController::class, 'status'])->name('classes.status');
    
});
