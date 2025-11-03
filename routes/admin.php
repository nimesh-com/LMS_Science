<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollManageController;


Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

    /* Manage Modules */
    Route::resource('/modules', ModuleController::class);
    Route::get('/modules', [ModuleController::class, 'index'])->name('modules');

    /* Manage Courses */
    Route::resource('/courses', CourseController::class);
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');

    /* Manage Enrollments */
    Route::resource('/enrollments', EnrollManageController::class);
    Route::get('/enrollments', [EnrollManageController::class, 'index'])->name('enrollments');
    
});
