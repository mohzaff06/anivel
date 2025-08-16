<?php

use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;

// Debug route to check application status
Route::get('/debug', function () {
    return response()->json([
        'status' => 'success',
        'message' => 'AniVel application is working!',
        'timestamp' => now(),
        'app_env' => config('app.env'),
        'app_debug' => config('app.debug'),
        'admin_key' => config('admin.key', 'not_set'),
        'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'not_set',
        'script_name' => $_SERVER['SCRIPT_NAME'] ?? 'not_set',
        'request_uri' => $_SERVER['REQUEST_URI'] ?? 'not_set'
    ]);
});

// Simple test route to check if Laravel is working
Route::get('/ping', function () {
    return 'AniVel is working!';
});

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
            'debug' => '/debug',
            'ping' => '/ping',
            'test' => '/test',
            'homepage' => '/',
            'animation' => '/animation',
            'levels' => '/levels',
            'create_lesson' => '/create'
        ],
        'admin_key' => 'dhdouh08'
    ], 404);
});
