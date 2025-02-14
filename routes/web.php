<?php

use App\Http\Controllers\MetMuseum\MetMuseumController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [MetMuseumController::class, 'search']);
