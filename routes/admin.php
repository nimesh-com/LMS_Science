<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageClassController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CourseController;

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

    Route::resource('/modules', ModuleController::class);
    Route::get('/modules', [ModuleController::class, 'index'])->name('modules');
    Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');

    Route::resource('/courses', CourseController::class);
    Route::get('/manage-classes', [ManageClassController::class, 'index'])->name('manage-classes');

    Route::get('/courses', [CourseController::class, 'index'])->name('course-manage');

});
