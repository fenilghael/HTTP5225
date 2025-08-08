<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfessorController;

Route::get('/', function () {
    return redirect()->route('learners.index');
});

Route::resource('learners', UserController::class);
Route::resource('programs', CourseController::class);
Route::get('/faculty', [ProfessorController::class, 'index'])->name('faculty.index'); 