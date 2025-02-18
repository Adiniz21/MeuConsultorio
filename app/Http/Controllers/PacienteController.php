<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        // Validação
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|digits:11|unique:pacientes,cpf',
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:pacientes,email'
        ]);

        Paciente::create($validatedData);
        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente criado com sucesso!');
    }

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show', compact('paciente'));
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|digits:11|unique:pacientes,cpf,' . $id,
            'data_nascimento' => 'required|date',
            'email' => 'required|email|unique:pacientes,email,' . $id
        ]);

        $paciente->update($validatedData);
        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return redirect()->route('pacientes.index')
            ->with('success', 'Paciente excluído com sucesso!');
    }
}
