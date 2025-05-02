<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\NichoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ConsultaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin/users', [UserRoleController::class, 'index'])->name('admin.users');
    Route::post('/admin/users/{user}/change-role', [UserRoleController::class, 'changeRole'])->name('admin.changeRole');
});


Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/usuarios-consulta', [UserRoleController::class, 'index'])->name('admin.users.index');
    Route::post('/usuarios-consulta/{user}/cambiar-rol', [UserRoleController::class, 'updateRole'])->name('admin.users.updateRole');
});


    Route::get('/admin/user-roles', [UserRoleController::class, 'index'])->name('admin.user-roles.index' ) ->middleware('is_admin');
    Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
        Route::get('/user-roles', [UserRoleController::class, 'index'])->name('admin.user-roles.index');
        Route::put('/user-roles/{user}/change-role', [UserRoleController::class, 'changeRole'])->name('admin.changeRole');
    });


    Route::middleware(['auth', 'role:Administrador'])->group(function () {
        Route::get('/admin/gestion-nichos', [NichoController::class, 'index'])->name('nichos.index');
    });

    Route::middleware(['auth', 'role:Ayudante'])->group(function () {
        Route::get('/ayudante/reportes', [ReporteController::class, 'basicos'])->name('reportes.basicos');
    });

    Route::middleware(['auth', 'role:Auditor'])->group(function () {
        Route::get('/auditor/reportes', [ReporteController::class, 'auditoria'])->name('reportes.auditoria');
    });

    Route::middleware(['auth', 'role:Usuario de Consulta'])->group(function () {
        Route::get('/consulta/visualizar', [ConsultaController::class, 'index'])->name('consulta.index');
    });




require __DIR__.'/auth.php';
