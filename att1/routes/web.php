<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('departamentos')->name('departamentos.')->group(function () {
    Route::get('/', [DepartamentoController::class, 'index'])->name('index');
    Route::get('/create', [DepartamentoController::class, 'create'])->name('create');
    Route::post('/', [DepartamentoController::class, 'store'])->name('store');
    Route::get('/{departamento}', [DepartamentoController::class, 'show'])->name('show');
    Route::get('/{departamento}/edit', [DepartamentoController::class, 'edit'])->name('edit');
    Route::put('/{departamento}', [DepartamentoController::class, 'update'])->name('update');
    Route::delete('/{departamento}', [DepartamentoController::class, 'destroy'])->name('destroy');
});

Route::prefix('funcionarios')->name('funcionarios.')->group(function () {
    Route::get('/', [FuncionarioController::class, 'index'])->name('index');
    Route::get('/create', [FuncionarioController::class, 'create'])->name('create');
    Route::post('/store', [FuncionarioController::class, 'store'])->name('store');
    Route::get('/{funcionario}', [FuncionarioController::class, 'show'])->name('show');
    Route::get('/{funcionario}/edit', [FuncionarioController::class, 'edit'])->name('edit');
    Route::put('/{funcionario}', [FuncionarioController::class, 'update'])->name('update');
    Route::delete('/{funcionario}', [FuncionarioController::class, 'destroy'])->name('destroy');
});

Route::prefix('cargos')->name('cargos.')->group(function () {
    Route::get('/', [CargoController::class, 'index'])->name('index');
    Route::get('/create', [CargoController::class, 'create'])->name('create');
    Route::post('/', [CargoController::class, 'store'])->name('store');
    Route::get('/{cargo}', [CargoController::class, 'show'])->name('show');
    Route::get('/{cargo}/edit', [CargoController::class, 'edit'])->name('edit');
    Route::put('/{cargo}', [CargoController::class, 'update'])->name('update');
    Route::delete('/{cargo}', [CargoController::class, 'destroy'])->name('destroy');
});

Route::prefix('turnos')->name('turnos.')->group(function () {
    Route::get('/', [TurnoController::class, 'index'])->name('index');
    Route::get('/create', [TurnoController::class, 'create'])->name('create');
    Route::post('/', [TurnoController::class, 'store'])->name('store');
    Route::get('/{turno}', [TurnoController::class, 'show'])->name('show');
    Route::get('/{turno}/edit', [TurnoController::class, 'edit'])->name('edit');
    Route::put('/{turno}', [TurnoController::class, 'update'])->name('update');
    Route::delete('/{turno}', [TurnoController::class, 'destroy'])->name('destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
