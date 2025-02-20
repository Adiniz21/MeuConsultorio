<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::paginate(15);
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'crm.regex' => 'O CRM deve estar no formato 000000/UF (6 dígitos, barra e 2 letras).',
        ];
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'crm' => [
                'required',
                'unique:medicos,crm',
                'regex:/^\d{6}\/[A-Za-z]{2}$/',
            ],
            'especialidade' => 'required|string|max:255'
        ], $messages);

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
        $messages = [
            'crm.regex' => 'O CRM deve estar no formato 000000/UF (6 dígitos, barra e 2 letras).',
        ];
        $medico = Medico::findOrFail($id);

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'crm' => [
                'required',
                // ignora o ID atual na verificação de uniqueness
                "unique:medicos,crm,{$id}",
                'regex:/^\d{6}\/[A-Za-z]{2}$/',
            ],
            'especialidade' => 'required|string|max:255'
        ], $messages);

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

    public function relatorioAtendimentos($id)
    {
        $medico = Medico::findOrFail($id);

        $atendimentos = $medico->atendimentos()
            ->with('paciente')
            ->paginate(15);

        return view('relatorios.atendimentos-por-medico', compact('medico', 'atendimentos'));
    }

}
