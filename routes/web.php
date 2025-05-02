<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\NichoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\ExhumacionController;

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
    ->middleware('gestion_nichos');
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
Route::get('/contratos', [ContratoController::class, 'index'])->name('contratos.index')->middleware('contratos');
// Ruta para mostrar formulario de creación
Route::get('/contratos/create', [ContratoController::class, 'create'])->name('contratos.create')->middleware('contratos');

// Ruta para guardar un nuevo contrato
Route::post('/contratos', [ContratoController::class, 'store'])->name('contratos.store')->middleware('contratos');

// Ruta para mostrar formulario de edición
Route::get('/contratos/{id}/edit', [ContratoController::class, 'edit'])->name('contratos.edit')->middleware('contratos');

// Ruta para actualizar un contrato existente
Route::put('/contratos/{id}', [ContratoController::class, 'update'])->name('contratos.update')->middleware('contratos');

// Ruta para ver los detalles de un contrato (opcional)
// Route::get('/contratos/{id}', [ContratoController::class, 'show'])->name('contratos.show');

use App\Http\Controllers\OcupanteController;
use App\Http\Controllers\ResponsableController;

//ocupante
// Ver formulario de creación
Route::get('/ocupantes/create', [OcupanteController::class, 'create'])->name('ocupantes.create')->middleware('gestion_ocupantes');

// Guardar ocupante (crear)
Route::post('/ocupantes', [OcupanteController::class, 'store'])->name('ocupantes.store')->middleware('gestion_ocupantes');

// Ver formulario de edición
Route::get('/ocupantes/{id}/edit', [OcupanteController::class, 'edit'])->name('ocupantes.edit')->middleware('gestion_ocupantes');

// Actualizar ocupante
Route::put('/ocupantes/{id}', [OcupanteController::class, 'update'])->name('ocupantes.update')->middleware('gestion_ocupantes');

// Ver vista de un ocupante (detalle)
Route::get('/ocupantes/{id}', [OcupanteController::class, 'show'])->name('ocupantes.show')->middleware('gestion_ocupantes');

// (Opcional) Listar todos
Route::get('/ocupantes', [OcupanteController::class, 'index'])->name('ocupantes.index')->middleware('gestion_ocupantes');

  // Eliminar (borrado lógico)
  Route::delete('/ocupantes/{id}', [OcupanteController::class, 'destroy'])->name('ocupantes.destroy')->middleware('gestion_ocupantes');

// Mostrar formulario de creación
Route::get('/responsables/create', [ResponsableController::class, 'create'])->name('responsables.create')->middleware('responsable');

// Guardar nuevo responsable
Route::post('/responsables', [ResponsableController::class, 'store'])->name('responsables.store')->middleware('responsable');

// Mostrar formulario de edición
Route::get('/responsables/{id}/edit', [ResponsableController::class, 'edit'])->name('responsables.edit')->middleware('responsable');

// Actualizar responsable
Route::put('/responsables/{id}', [ResponsableController::class, 'update'])->name('responsables.update')->middleware('responsable');

// Ver lista de responsables
Route::get('/responsables', [ResponsableController::class, 'index'])->name('responsables.index')->middleware('responsable');

// (Opcional) Ver detalle de un responsable
Route::get('/responsables/{id}', [ResponsableController::class, 'show'])->name('responsables.show')->middleware('responsable');


 // Listado
 Route::get('/exhumaciones', [ExhumacionController::class, 'index'])->name('exhumacion.index')->middleware('is_admin');

 // Formulario para crear
 Route::get('/exhumaciones/create', [ExhumacionController::class, 'create'])->name('exhumacion.create')->middleware('is_admin');

 // Guardar nueva exhumación
 Route::post('/exhumaciones', [ExhumacionController::class, 'store'])->name('exhumacion.store')->middleware('is_admin');

 // Formulario para editar (si decides implementarlo)
 Route::get('/exhumaciones/{id}/edit', [ExhumacionController::class, 'edit'])->name('exhumacion.edit')->middleware('is_admin');

 Route::put('/exhumaciones/update/{id}', [ExhumacionController::class, 'update'])->name('exhumacion.update')->middleware('is_admin');

 Route::delete('/exhumaciones/{id}', [ExhumacionController::class, 'destroy'])->name('exhumacion.destroy')->middleware('is_admin');

  require __DIR__ . '/auth.php';
