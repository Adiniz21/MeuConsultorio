<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Atendimento;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPacientes = Paciente::count();
        $totalMedicos = Medico::count();
        $totalAtendimentos = Atendimento::count();
        
        // Últimos atendimentos (já realizados)
        $ultimosAtendimentos = Atendimento::with(['paciente', 'medico'])
            ->where('data_atendimento', '<=', now())
            ->orderBy('data_atendimento', 'desc')
            ->take(5)
            ->get();

        // Formata a data/hora usando Carbon::parse()
        $ultimosAtendimentos = $ultimosAtendimentos->map(function ($atendimento) {
            if ($atendimento->data_atendimento) {
                $atendimento->data_atendimento_br = Carbon::parse($atendimento->data_atendimento)
                    ->format('d/m/Y H:i');
            } else {
                $atendimento->data_atendimento_br = null;
            }
            return $atendimento;
        });

        // Próximos atendimentos 
        $proximosAtendimentos = Atendimento::with(['paciente', 'medico'])
            ->where('data_atendimento', '>', now())
            ->orderBy('data_atendimento', 'asc')
            ->take(5)
            ->get();

        // Formata a data/hora usando Carbon::parse()
        $proximosAtendimentos = $proximosAtendimentos->map(function ($atendimento) {
            if ($atendimento->data_atendimento) {
                $atendimento->data_atendimento_br = Carbon::parse($atendimento->data_atendimento)
                    ->format('d/m/Y H:i');
            } else {
                $atendimento->data_atendimento_br = null;
            }
            return $atendimento;
        });

        return view('dashboard', compact(
            'totalPacientes',
            'totalMedicos',
            'totalAtendimentos',
            'ultimosAtendimentos',
            'proximosAtendimentos'
        ));
    }
}
