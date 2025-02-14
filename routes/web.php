<?php

use App\Http\Controllers\MetMuseum\MetMuseumController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MetMuseumController::class, 'index'] );

Route::get('/search', [MetMuseumController::class, 'search']);
