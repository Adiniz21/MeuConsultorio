@extends('layout')

@section('content')
    <h1 class="mb-4">Detalhes do Médico</h1>

    <div class="card">
        <div class="card-header">
            Médico #{{ $medico->id }}
        </div>
        <div class="card-body">
            <p><strong>Médico:</strong> 
                {{ $medico->nome }}
            </p>
            <p><strong>CRM:</strong> 
                {{ $medico->crm }}
            </p>
            <p><strong>Especialidade:</strong> 
                {{ $medico->especialidade }}
            </p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
@endsection
