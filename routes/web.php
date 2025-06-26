<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComunController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EncargadoController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::middleware("guest")->group(function(){
    Route::get('/', [AuthController::class, 'login_form'])-> name('login');
    Route::post('/to-login', [AuthController::class, 'to_login'])-> name('to_login');
    
    Route::get('/comun/crear', [ComunController::class, 'create'])-> name('create_comun');
    Route::post('/comun/guardar', [ComunController::class, 'store'])-> name('store_comun');
});

Route::middleware("auth")->group(function(){
    Route::get('/inicio', [AuthController::class, 'home'])-> name('home');
    Route::get('/to-logout', [AuthController::class, 'to_logout'])-> name('to_logout');

    //Administrador
    Route::get('/admin', [AdminController::class, 'index'])-> name('home_admin');
    Route::get('/admin/usuarios', [AdminController::class, 'user_index'])-> name('user_index_admin');

    //Encargado
    Route::get('/encargado', [EncargadoController::class, 'index'])-> name('home_encargado');

    //Comun
    Route::get('/comun', [ComunController::class, 'index'])-> name('home_comun');
});