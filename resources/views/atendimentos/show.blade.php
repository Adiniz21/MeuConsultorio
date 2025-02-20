@extends('layout')

@section('content')
    <h1 class="mb-4">Detalhes do Atendimento</h1>

    <div class="card">
        <div class="card-header">
            Atendimento #{{ $atendimento->id }}
        </div>
        <div class="card-body">
            <p><strong>Data/Hora do Atendimento:</strong>
                {{ $atendimento->data_atendimento->format('d/m/Y H:i') }}
            </p>
            <div class="border rounded p-1 mb-2">
                <h5><strong>Dados do Médico</strong></h5>
                <p><strong>Médico:</strong>
                    {{ $atendimento->medico->nome ?? 'N/A' }}
                    (CRM: {{ $atendimento->medico->crm ?? 'N/A' }})
                </p>
                <p><strong>CRM:</strong>
                    {{ $atendimento->medico->crm ?? 'N/A' }}
                </p>
                <p><strong>Especialidade:</strong>
                    {{ $atendimento->medico->especialidade ?? 'N/A' }}
                </p>
            </div>

            <div class="border rounded p-1">
                <h5><strong>Dados do paciente</strong></h5>
                <p><strong>Paciente:</strong>
                    {{ $atendimento->paciente->nome ?? 'N/A' }}
                </p>
                <p><strong>CPF:</strong>
                    {{ $atendimento->paciente->cpf_mask ?? 'N/A' }}
                </p>
                <p><strong>E-mail:</strong>
                    {{ $atendimento->paciente->email ?? 'N/A' }}
                </p>
            </div>

        </div>
    </div>

    <div class="mt-3">
        @if (request()->query('origin') === 'relatorio' && request()->query('medico_id'))
            <a href="{{ route('relatorios.medico', request()->query('medico_id')) }}" class="btn btn-secondary">
                Voltar para Relatório
            </a>
        @else
            <a href="{{ route('atendimentos.index') }}" class="btn btn-secondary">Voltar para Atendimentos</a>
        @endif
    </div>
@endsection
