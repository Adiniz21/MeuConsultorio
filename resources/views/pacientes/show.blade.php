@extends('layout')

@section('content')
    <h1 class="mb-4">Detalhes do Paciente</h1>

    <div class="card">
        <div class="card-header">
            Paciente #{{ $paciente->id }}
        </div>
        <div class="card-body">
            <p><strong>Paciente:</strong> 
                {{ $paciente->nome }}
            </p>
            <p><strong>CPF:</strong> 
                {{ $paciente->cpf_mask }}
            </p>
            <p><strong>Email:</strong> 
                {{ $paciente->email }}
            </p>
            <p><strong>Data de Nascimento:</strong> 
                {{ $paciente->data_nascimento->format('d/m/Y') }}
            </p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
