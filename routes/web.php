<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\NichoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ContratoController;

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


Route::get('/admin/user-roles', [UserRoleController::class, 'index'])->name('admin.user-roles.index')->middleware('is_admin');
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
//optener
Route::get('/gestion-nichos', [NichoController::class, 'index'])
    ->name('nichos.index')
    ->middleware('is_admin');
//ver vista
Route::get('/gestion-nichos/crear', [NichoController::class, 'create'])
    ->name('nichos.create')
    ->middleware('is_admin');
//guardar
Route::post('/gestion-nichos', [NichoController::class, 'store'])
    ->name('nichos.store')
    ->middleware('is_admin');
//editar
    Route::get('/admin/gestion-nichos/{nicho}/editar', [NichoController::class, 'edit'])->name('nichos.edit')->middleware('is_admin');
    Route::put('/admin/gestion-nichos/{nicho}', [NichoController::class, 'update'])->name('nichos.update')->middleware('is_admin');


//Contrato

// Ruta para ver todos los contratos
Route::get('/contratos', [ContratoController::class, 'index'])->name('contratos.index')->middleware('is_admin');
// Ruta para mostrar formulario de creación
Route::get('/contratos/create', [ContratoController::class, 'create'])->name('contratos.create')->middleware('is_admin');

// Ruta para guardar un nuevo contrato
Route::post('/contratos', [ContratoController::class, 'store'])->name('contratos.store')->middleware('is_admin');

// Ruta para mostrar formulario de edición
Route::get('/contratos/{id}/edit', [ContratoController::class, 'edit'])->name('contratos.edit')->middleware('is_admin');

// Ruta para actualizar un contrato existente
Route::put('/contratos/{id}', [ContratoController::class, 'update'])->name('contratos.update')->middleware('is_admin');

// Ruta para ver los detalles de un contrato (opcional)
// Route::get('/contratos/{id}', [ContratoController::class, 'show'])->name('contratos.show');


require __DIR__ . '/auth.php';
