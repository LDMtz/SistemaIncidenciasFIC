<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ReporteController;

Route::middleware("guest")->group(function () {
    Route::get('/', [AuthController::class, 'login_form'])->name('login');
    Route::post('/to-login', [AuthController::class, 'to_login'])->name('to_login');

    Route::get('comun/usuarios/nuevo', [UsuarioController::class, 'create'])->name('comun.usuarios.crear');
    Route::post('comun/usuarios', [UsuarioController::class, 'store'])->name('comun.usuarios.guardar');
});

Route::middleware("auth")->group(function () {

    //Rutas generales
    Route::get('/inicio', [AuthController::class, 'home'])->name('home');
    Route::get('/to-logout', [AuthController::class, 'to_logout'])->name('to_logout');

    Route::get('general/usuarios/perfil', [UsuarioController::class, 'profile'])->name('usuarios.perfil');
    Route::patch('general/usuarios/perfil/{id}', [UsuarioController::class, 'update_profile'])->name('usuarios.perfil.actualizar');
    Route::get('general/usuarios/perfil/nueva-clave', [UsuarioController::class, 'new_password'])->name('clave.nueva');
    Route::patch('general/usuarios/perfil/nueva-clave/{id}', [UsuarioController::class, 'update_password'])->name('clave.actualizar');

    Route::get('general/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
    Route::patch('general/notificaciones/{id}', [NotificacionController::class, 'mark_as_read'])->name('notificaciones.leer');
    Route::patch('general/notificaciones', [NotificacionController::class, 'mark_all_as_read'])->name('notificaciones.leer.todas');
    Route::delete('general/notificaciones/{id}', [NotificacionController::class, 'destroy'])->name('notificaciones.eliminar');
    Route::delete('general/notificaciones', [NotificacionController::class, 'destroy_all'])->name('notificaciones.eliminar.todas');

    Route::get('general/reportes/nuevo', [ReporteController::class, 'create'])->name('reportes.crear');
    Route::post('general/reportes', [ReporteController::class, 'store'])->name('reportes.guardar');
    Route::get('general/reportes/{id}', [ReporteController::class, 'show'])->name('reportes.mostrar');

    //Rutas basadas en el Rol del usuario
    Route::middleware('rol:Administrador')->group(function () {
        Route::get('admin/usuarios', [UsuarioController::class, 'admin_index'])->name('admin.usuarios.index');
        Route::post('admin/usuarios', [UsuarioController::class, 'store'])->name('admin.usuarios.guardar');
        Route::get('admin/usuarios/{id}', [UsuarioController::class, 'show'])->name('admin.usuarios.mostrar');
        Route::get('admin/usuarios/modificar/{id}', [UsuarioController::class, 'edit'])->name('admin.usuarios.modificar');
        Route::patch('admin/usuarios/{id}', [UsuarioController::class, 'admin_update'])->name('admin.usuarios.actualizar');
        Route::delete('admin/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('admin.usuarios.eliminar');

        Route::get('admin/areas', [AreaController::class, 'admin_index'])->name('admin.areas.index');
        Route::post('admin/areas', [AreaController::class, 'store'])->name('admin.areas.guardar');
        Route::get('admin/areas/{id}', [AreaController::class, 'show'])->name('admin.areas.mostrar');
        Route::get('admin/areas/usuario/{id}', [AreaController::class, 'show_user_areas'])->name('admin.areas.usuario.mostrar');
        Route::get('admin/areas/modificar/{id}', [AreaController::class, 'edit'])->name('admin.areas.modificar');
        Route::patch('admin/areas/{id}', [AreaController::class, 'update'])->name('admin.areas.actualizar');
        Route::delete('admin/areas/{id}', [AreaController::class, 'destroy'])->name('admin.areas.eliminar');

        Route::get('admin/reportes', [ReporteController::class, 'admin_index'])->name('admin.reportes.index');
        //Route::patch('admin/reportes/actualizar/{id}/estado', [ReporteController::class, 'update_state'])->name('admin.reportes.estado.actualizar');
        //Route::patch('admin/reportes/actualizar/{id}/severidad', [ReporteController::class, 'update_severity'])->name('admin.reportes.severidad.actualizar');
        Route::patch('admin/reportes/{id}', [ReporteController::class, 'admin_update'])->name('admin.reportes.actualizar');
    });

    Route::middleware('rol:Encargado')->group(function () {
        //
    });

    Route::middleware('rol:Común')->group(function () {
        //
    });
});
