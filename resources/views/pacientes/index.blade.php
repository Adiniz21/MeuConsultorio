@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Pacientes</h1>
        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">Novo Paciente</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Data Nascimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->id }}</td>
                <td>{{ $paciente->nome }}</td>
                <td>{{ $paciente->cpf }}</td>
                <td>{{ $paciente->email }}</td>
                <td>{{ $paciente->data_nascimento }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('pacientes.show', $paciente->id) }}">Ver</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('pacientes.edit', $paciente->id) }}">Editar</a>
                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
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
