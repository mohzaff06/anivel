<?php

use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/create', [LessonController::class, 'create'])->can('admin');
Route::get('/{category}', [LessonController::class, 'index']);
Route::post('/create', [LessonController::class, 'store'])->can('admin');
Route::get('/{category}/{lesson}', [LessonController::class, 'show']);
Route::get('/{category}/{lesson}/edit', [LessonController::class, 'edit']);
Route::post('/{category}/{lesson}/edit', [LessonController::class, 'update']);
Route::delete('/{category}/{lesson}', [LessonController::class, 'destroy']);
