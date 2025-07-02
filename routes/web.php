<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::middleware("guest")->group(function(){
    Route::get('/', [AuthController::class, 'login_form'])-> name('login');
    Route::post('/to-login', [AuthController::class, 'to_login'])-> name('to_login');
    
    Route::get('comun/usuarios/crear', [UsuarioController::class, 'create'])-> name('comun.usuarios.crear');
    Route::post('comun/usuarios/guardar', [UsuarioController::class, 'store'])-> name('comun.usuarios.guardar');
});

Route::middleware("auth")->group(function(){
    Route::get('/inicio', [AuthController::class, 'home'])-> name('home');
    Route::get('/to-logout', [AuthController::class, 'to_logout'])-> name('to_logout');

    Route::get('usuarios/perfil', [UsuarioController::class, 'profile'])-> name('usuarios.perfil');
    Route::patch('usuarios/perfil/actualizar/{id}', [UsuarioController::class, 'update_profile'])-> name('usuarios.perfil.actualizar');
    
    Route::get('admin/usuarios', [UsuarioController::class, 'admin_index'])-> name('admin.usuarios.index');
    Route::post('admin/usuarios/guardar', [UsuarioController::class, 'store'])-> name('admin.usuarios.guardar');
    Route::get('admin/usuarios/{id}', [UsuarioController::class, 'show'])-> name('admin.usuarios.mostrar');
    Route::get('admin/usuarios/modificar/{id}', [UsuarioController::class, 'edit'])-> name('admin.usuarios.modificar');
    Route::patch('admin/usuarios/actualizar/{id}', [UsuarioController::class, 'admin_update'])-> name('admin.usuarios.actualizar');
    Route::delete('admin/usuarios/eliminar/{id}', [UsuarioController::class, 'destroy'])-> name('admin.usuarios.eliminar');



});