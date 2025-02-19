<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AtendimentoController extends Controller
{
    public function index()
    {
        // Pode carregar médico e paciente para exibir na listagem
        $atendimentos = Atendimento::with(['medico', 'paciente'])->get();
        return view('atendimentos.index', compact('atendimentos'));
    }

    public function create()
    {
        // Carregar médicos e pacientes para popular <select> nos formularios
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('atendimentos.create', compact('medicos', 'pacientes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'data_atendimento' => 'required|date',
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
        ]);

        Atendimento::create($validatedData);
        return redirect()->route('atendimentos.index')
            ->with('success', 'Atendimento criado com sucesso!');
    }

    public function show($id)
    {
        $atendimento = Atendimento::with(['medico', 'paciente'])->findOrFail($id);
        return view('atendimentos.show', compact('atendimento'));
    }

    public function edit($id)
    {
        $atendimento = Atendimento::findOrFail($id);
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('atendimentos.edit', compact('atendimento', 'medicos', 'pacientes'));
    }

    public function update(Request $request, $id)
    {
        $atendimento = Atendimento::findOrFail($id);

        $validatedData = $request->validate([
            'data_atendimento' => 'required|date',
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
        ]);

        $atendimento->update($validatedData);
        return redirect()->route('atendimentos.index')
            ->with('success', 'Atendimento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $atendimento = Atendimento::findOrFail($id);
        $atendimento->delete();

        return redirect()->route('atendimentos.index')
            ->with('success', 'Atendimento excluído com sucesso!');
    }
}
