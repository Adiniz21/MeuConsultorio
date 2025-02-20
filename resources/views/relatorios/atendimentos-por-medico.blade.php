@extends('layout')

@section('content')
    <h1>Relatório de Atendimentos – Dr(a). {{ $medico->nome }}</h1>

    @if ($medico->atendimentos->count())
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Data Atendimento</th>
                    <th>Paciente</th>
                    <th>ID Atendimento</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medico->atendimentos as $atendimento)
                    <tr>
                        <td>{{ $atendimento->data_atendimento->format('d/m/Y H:i') }}</td>
                        <td>{{ $atendimento->paciente->nome ?? 'N/A' }}</td>
                        <td>{{ $atendimento->paciente->cpf ?? 'N/A' }}</td>
                        <td> <a class="btn btn-sm btn-info"
                                href="{{ route('atendimentos.show', $atendimento->id) }}?origin=relatorio&medico_id={{ $medico->id }}">
                                Mais Informações
                            </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $atendimentos->links('pagination::bootstrap-5') }}
        </div>
    @else
        <p class="mt-3">Nenhum atendimento encontrado para este médico.</p>
    @endif

    <a href="{{ route('medicos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
