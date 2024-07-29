<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProgramapiController;
use App\Http\Controllers\ProjectionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('programs/{program}/curriculum-semesters', [ProgramapiController::class, 'getCurriculumSemesters']);
Route::post('projections/load-semesters', [ProjectionController::class, 'loadSemesters'])->name('api.projections.load-semesters');
