<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'crm' => 'required|unique:medicos,crm',
            'especialidade' => 'required|string|max:255'
        ]);

        Medico::create($validatedData);
        return redirect()->route('medicos.index')
            ->with('success', 'Médico criado com sucesso!');
    }

    public function show($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.show', compact('medico'));
    }

    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, $id)
    {
        $medico = Medico::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'crm' => 'required|unique:medicos,crm,' . $id,
            'especialidade' => 'required|string|max:255'
        ]);

        $medico->update($validatedData);
        return redirect()->route('medicos.index')
            ->with('success', 'Médico atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return redirect()->route('medicos.index')
            ->with('success', 'Médico excluído com sucesso!');
    }
}
