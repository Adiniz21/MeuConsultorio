@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Médicos</h1>
        <a href="{{ route('medicos.create') }}" class="btn btn-primary">Novo Médico</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CRM</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
            <tr>
                <td>{{ $medico->id }}</td>
                <td>{{ $medico->nome }}</td>
                <td>{{ $medico->crm }}</td>
                <td>{{ $medico->especialidade }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('medicos.show', $medico->id) }}">Ver</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('medicos.edit', $medico->id) }}">Editar</a>
                    <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" 
                                onclick="return confirm('Tem certeza que deseja excluir?')">
                                Excluir
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
