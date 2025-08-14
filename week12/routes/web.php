<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;

Route::get('/', function () {
    return redirect()->route('users.index');
});

Route::resource('users', UserController::class);
Route::resource('courses', CourseController::class);
Route::resource('professors', ProfessorController::class); 