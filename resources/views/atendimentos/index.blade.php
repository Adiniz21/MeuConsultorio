@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Atendimentos</h1>
        <a href="{{ route('atendimentos.create') }}" class="btn btn-primary">Novo Atendimento</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Paciente</th>
                <th>Médico</th>
                <th>Horário do Atendimento</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($atendimentos as $atendimento)
            <tr>
                <td>{{ $atendimento->id }}</td>
                <td>{{ $atendimento->paciente->nome }}</td>
                <td>{{ $atendimento->medico->nome }}</td>
                <td>{{ $atendimento->data_atendimento->format('d/m/Y H:i') }}</td>
                <td>
                    <a class="btn btn-sm btn-info" href="{{ route('atendimentos.show', $atendimento->id) }}">Ver</a>
                    <a class="btn btn-sm btn-warning" href="{{ route('atendimentos.edit', $atendimento->id) }}">Editar</a>
                    <form action="{{ route('atendimentos.destroy', $atendimento->id) }}" method="POST" style="display:inline;">
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
    <div class="mt-3 d-flex justify-content-center">
        {{ $atendimentos->links('pagination::bootstrap-5') }}
    </div>
@endsection
