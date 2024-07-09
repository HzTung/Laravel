<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/home', [HomeController::class, 'index']);
route::get('/home/{id}', [HomeController::class, 'show']);
