<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ManageClassController;
use App\Http\Controllers\ModuleController;

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

    Route::resource('/modules', ModuleController::class);
    Route::get('/modules/create', [ModuleController::class, 'create'])->name('modules.create');

});

Route::get('/manage-class', [ManageClassController::class, 'index'])
->middleware(['auth', 'verified'])
->name('manage-class');