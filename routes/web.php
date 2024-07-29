<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SemesterSubjectController;
use App\Http\Controllers\ProjectionController;
use App\Http\Controllers\GroupController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //Rutas de la Aplicacion
    Route::resource('dashboard/program', ProgramController::class);
    Route::resource('dashboard/teacher', TeacherController::class);
    Route::resource('dashboard/subject', SubjectController::class);
    Route::resource('dashboard/semesterSubject', SemesterSubjectController::class);
    Route::resource('dashboard/projection', ProjectionController::class);
    Route::get('dashboard/load-semesters/{programId}', [ProjectionController::class, 'loadSemesters'])->name('load.semesters');
    Route::resource('dashboard/group', GroupController::class);
    Route::post('dashboard/group/auto-generate', [GroupController::class, 'autoGenerate'])->name('group.autoGenerate');
});

require __DIR__.'/auth.php';
