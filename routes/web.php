<?php

use App\Http\Controllers\MetMuseum\MetMuseumController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'message' => 'This is your custom landing page built with Vue.js and Inertia.js',
    ]);
});

Route::get('/search', [MetMuseumController::class, 'search']);
