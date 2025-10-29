<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ManageClassController;

Route::get('/manage-class', [ManageClassController::class, 'index'])
->middleware(['auth', 'verified'])
->name('manage-class');