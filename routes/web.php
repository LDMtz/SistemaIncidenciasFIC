<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ReporteController;

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

    //Rutas generales
    Route::get('/inicio', [AuthController::class, 'home'])-> name('home');
    Route::get('/to-logout', [AuthController::class, 'to_logout'])-> name('to_logout');

    Route::get('general/usuarios/perfil', [UsuarioController::class, 'profile'])-> name('usuarios.perfil');
    Route::patch('general/usuarios/perfil/actualizar/{id}', [UsuarioController::class, 'update_profile'])-> name('usuarios.perfil.actualizar');
    Route::get('general/usuarios/perfil/nueva-clave', [UsuarioController::class, 'new_password'])-> name('clave.nueva');
    Route::patch('general/usuarios/perfil/actualizar-clave/{id}', [UsuarioController::class, 'update_password'])-> name('clave.actualizar');

    Route::get('general/notificaciones', [NotificacionController::class, 'index'])-> name('notificaciones.index');
    Route::patch('general/notificaciones/marcar-leida/{id}', [NotificacionController::class, 'mark_as_read'])->name('notificaciones.leer');
    Route::patch('general/notificaciones/marcar-todas-leidas', [NotificacionController::class, 'mark_all_as_read'])->name('notificaciones.leer.todas');
    Route::delete('general/notificaciones/eliminar/{id}', [NotificacionController::class, 'destroy'])->name('notificaciones.eliminar');
    Route::delete('general/notificaciones/eliminar-todas', [NotificacionController::class, 'destroy_all'])->name('notificaciones.eliminar.todas');

    Route::get('general/reportes/{id}', [ReporteController::class, 'show'])->name('reportes.mostrar');
    Route::post('general/reportes/guardar', [ReporteController::class, 'store'])->name('reportes.guardar');

    //Rutas basadas en el Rol del usuario
    Route::middleware('rol:Administrador')->group(function () {
        Route::get('admin/usuarios', [UsuarioController::class, 'admin_index'])-> name('admin.usuarios.index');
        Route::post('admin/usuarios/guardar', [UsuarioController::class, 'store'])-> name('admin.usuarios.guardar');
        Route::get('admin/usuarios/{id}', [UsuarioController::class, 'show'])-> name('admin.usuarios.mostrar');
        Route::get('admin/usuarios/modificar/{id}', [UsuarioController::class, 'edit'])-> name('admin.usuarios.modificar');
        Route::patch('admin/usuarios/actualizar/{id}', [UsuarioController::class, 'admin_update'])-> name('admin.usuarios.actualizar');
        Route::delete('admin/usuarios/eliminar/{id}', [UsuarioController::class, 'destroy'])-> name('admin.usuarios.eliminar');

        Route::get('admin/areas', [AreaController::class, 'admin_index'])-> name('admin.areas.index');
        Route::post('admin/areas/guardar', [AreaController::class, 'store'])-> name('admin.areas.guardar');
        Route::get('admin/areas/{id}', [AreaController::class, 'show'])-> name('admin.areas.mostrar');
        Route::get('admin/areas/usuario/{id}', [AreaController::class, 'show_user_areas'])-> name('admin.areas.usuario.mostrar');
        Route::get('admin/areas/modificar/{id}', [AreaController::class, 'edit'])-> name('admin.areas.modificar');
        Route::patch('admin/areas/actualizar/{id}', [AreaController::class, 'update'])-> name('admin.areas.actualizar');
        Route::delete('admin/areas/eliminar/{id}', [AreaController::class, 'destroy'])-> name('admin.areas.eliminar');
    });

    Route::middleware('rol:Encargado')->group(function (){
       //
    });

    Route::middleware('rol:Común')->group(function (){
       //
    });    

});