@extends('layout')

@section('content')
    <h1 class="mb-4">Dashboard</h1>

    {{-- Cards de estatísticas --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-bg-primary mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Pacientes</h5>
                    <p class="display-5">{{ $totalPacientes }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-success mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Médicos</h5>
                    <p class="display-5">{{ $totalMedicos }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-bg-warning mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Atendimentos</h5>
                    <p class="display-5">{{ $totalAtendimentos }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabela de Últimos Atendimentos --}}
    <div class="card">
        <div class="card-header">
            Últimos Atendimentos
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data Atendimento</th>
                        <th>Médico</th>
                        <th>Paciente</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($ultimosAtendimentos as $atendimento)
                    <tr>
                        <td>{{ $atendimento->id }}</td>
                        <td>{{ $atendimento->data_atendimento_br ?? 'N/A' }}</td>
                        <td>{{ $atendimento->medico->nome ?? 'N/A' }}</td>
                        <td>{{ $atendimento->paciente->nome ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum atendimento recente.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tabela de Próximos Atendimentos --}}
    <div class="card mt-4 mb-4">
        <div class="card-header">
            Próximos Atendimentos
        </div>
        <div class="card-body p-0">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Data Atendimento</th>
                        <th>Médico</th>
                        <th>Paciente</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($proximosAtendimentos as $atendimento)
                    <tr>
                        <td>{{ $atendimento->id }}</td>
                        <td>{{ $atendimento->data_atendimento_br ?? 'N/A' }}</td>
                        <td>{{ $atendimento->medico->nome ?? 'N/A' }}</td>
                        <td>{{ $atendimento->paciente->nome ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Nenhum atendimento futuro.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
