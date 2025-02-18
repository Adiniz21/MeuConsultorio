<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\AtendimentoController;

// Pacientes
Route::resource('pacientes', PacienteController::class);

// Médicos
Route::resource('medicos', MedicoController::class);

// Atendimentos
Route::resource('atendimentos', AtendimentoController::class);

// Rota inicial (opcional)
Route::get('/', function () {
    return redirect()->route('pacientes.index');
});
