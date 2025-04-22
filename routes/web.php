<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Cursos
// Padrão Celke
// Route::get('/index-course', [CourseController::class, 'index'])->name('course.index');
// Route::get('/show-course/{course}', [CourseController::class, 'show'])->name('course.show');
// Route::get('/create-course', [CourseController::class, 'create'])->name('course.create');
// Route::post('/store-course', [CourseController::class, 'store'])->name('course.store');
// Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('course.edit');
// Route::put('/update-course/{course}', [CourseController::class, 'update'])->name('course.update');
// Route::delete('/destroy-course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');

// Padrão Brayan
Route::get('/cursos', [CourseController::class, 'index'])->name('course.index');
Route::get('/cursos/novo', [CourseController::class, 'create'])->name('course.create'); // <- ANTES da {course}
Route::post('/cursos', [CourseController::class, 'store'])->name('course.store');
Route::get('/cursos/{course}/editar', [CourseController::class, 'edit'])->name('course.edit');
Route::put('/cursos/{course}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/cursos/{course}', [CourseController::class, 'destroy'])->name('course.destroy');
Route::get('/cursos/{course}', [CourseController::class, 'show'])->name('course.show'); // <- POR ÚLTIMO



// Aulas
// Padrão Celke
// Route::get('/index-classe/{course}', [ClasseController::class, 'index'])->name('classe.index');


// Padrão Brayan
Route::get('/cursos/{course}/aulas', [ClasseController::class, 'index'])->name('classe.index');
