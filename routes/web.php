<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});
Route::get('/teacher',[TeacherController::class,'index'])->name('teachers.index');
Route::get('/teacher/create',[TeacherController::class,'create'])->name('teachers.create');
Route::post('/teacher',[TeacherController::class,'store'])->name('teachers.store');
Route::get('/teacher/{teacher}/edit',[TeacherController::class,'edit'])->name('teachers.edit');
Route::put('/teacher/{teacher}/update',[TeacherController::class,'update'])->name('teachers.update');
require __DIR__.'/auth.php';
