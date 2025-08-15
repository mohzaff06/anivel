<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/animation', function () {
    return view('animation');
});
Route::get('/levels', function () {
    return view('levels');
});
