<?php

use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;

// Test route to check if application is working
Route::get('/test', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'AniVel application is working!',
        'timestamp' => now(),
        'admin_key' => config('admin.key', 'not_set')
    ]);
});

Route::get('/', function () {
    return view('index');
});

// Temporarily removed admin middleware for testing
Route::get('/create', [LessonController::class, 'create']);
Route::get('/{category}', [LessonController::class, 'index']);
Route::post('/create', [LessonController::class, 'store']);
Route::get('/{category}/{lesson}', [LessonController::class, 'show']);
Route::get('/{category}/{lesson}/edit', [LessonController::class, 'edit']);
Route::post('/{category}/{lesson}/edit', [LessonController::class, 'update']);
Route::delete('/{category}/{lesson}', [LessonController::class, 'destroy']);

// Fallback route for any undefined routes
Route::fallback(function () {
    return response()->json([
        'error' => 'Route not found',
        'message' => 'The requested route does not exist.',
        'available_routes' => [
            'homepage' => '/',
            'test' => '/test',
            'animation' => '/animation',
            'levels' => '/levels',
            'create_lesson' => '/create'
        ],
        'admin_key' => 'dhdouh08'
    ], 404);
});
