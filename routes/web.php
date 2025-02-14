<?php

use App\Http\Controllers\MetMuseum\MetMuseumController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome');
} );

Route::get('/search', [MetMuseumController::class, 'search']);

Route::get('/getDepartments', [MetMuseumController::class, 'getDepartments']);

Route::get('/search/results', [MetMuseumController::class, 'search']);

