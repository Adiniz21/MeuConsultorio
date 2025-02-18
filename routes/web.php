<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\AtendimentoController;
use App\Http\Controllers\DashboardController;

// Pacientes
Route::resource('pacientes', PacienteController::class);

// Médicos
Route::resource('medicos', MedicoController::class);

// Atendimentos
Route::resource('atendimentos', AtendimentoController::class);


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


