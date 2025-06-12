<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComunController;

Route::middleware("guest")->group(function(){
    Route::get('/', [AuthController::class, 'login_form'])-> name('login');
    Route::get('/comun/create', [ComunController::class, 'create'])-> name('create_comun');

    //Ejemplo de posible login
    //Route::post('/to-login', [AuthController::class, 'to_login'])-> name('to_login');
});

Route::middleware("auth")->group(function(){
    Route::get('/home', [AuthController::class, 'home'])-> name('home');

    //Ejemplo de posible log out
    //Route::get('/to-logout', [AuthController::class, 'to_logout'])-> name('to_logout');
});