<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\AdminUserController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');

// Cursos: CRUD restrito a admin (deve vir ANTES do {curso})
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
    Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
    Route::get('/cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::put('/cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
    Route::delete('/cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');
    Route::get('/admin/usuarios/create', [AdminUserController::class, 'create'])->name('admin.usuarios.create');
    Route::post('/admin/usuarios', [AdminUserController::class, 'store'])->name('admin.usuarios.store');
    Route::get('/admin/usuarios', [AdminUserController::class, 'index'])->name('admin.usuarios.index');
    Route::delete('/admin/usuarios/{user}', [AdminUserController::class, 'destroy'])->name('admin.usuarios.destroy');
    Route::get('/admin/usuarios/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.usuarios.edit');
Route::put('/admin/usuarios/{user}', [AdminUserController::class, 'update'])->name('admin.usuarios.update');
});

// Cursos: listagem e show público (depois do grupo admin)
Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');
Route::get('/cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');

// Eventos: CRUD restrito a admin (deve vir ANTES do {evento})
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
    Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
    Route::get('/eventos/{evento}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
    Route::put('/eventos/{evento}', [EventoController::class, 'update'])->name('eventos.update');
    Route::delete('/eventos/{evento}', [EventoController::class, 'destroy'])->name('eventos.destroy');
});

// Eventos: listagem e show público (depois do grupo admin)
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');

require __DIR__.'/auth.php';