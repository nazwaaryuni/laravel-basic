<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', [StudentController::class, 'index']);
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');