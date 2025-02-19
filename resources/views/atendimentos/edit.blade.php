@extends('layout')

@section('content')
    <h1 class="mb-4">Editar Atendimento #{{ $atendimento->id }}</h1>

    <div class="border border-black rounded mb-2 p-4">
        {{-- Exibe erros de validação, caso existam --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ocorreram alguns problemas!</strong>
                <ul>
                    @foreach ($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('atendimentos.update', $atendimento->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Campo de Data/Hora do Atendimento --}}
            <div class="mb-3">
                <label for="data_atendimento" class="form-label">Data do Atendimento</label>
                <input 
                    type="datetime-local" 
                    name="data_atendimento" 
                    id="data_atendimento" 
                    class="form-control"
                    value="{{ old('data_atendimento', optional($atendimento->data_atendimento)->format('Y-m-d\TH:i')) }}" 
                    required
                >
            </div>

            {{-- Campo de Médico --}}
            <div class="mb-3">
                <label for="medico_id" class="form-label">Médico</label>
                <select name="medico_id" id="medico_id" class="form-select" required>
                    <option value="" disabled>Selecione um médico</option>
                    @foreach ($medicos as $medico)
                        <option 
                            value="{{ $medico->id }}"
                            {{ old('medico_id', $atendimento->medico_id) == $medico->id ? 'selected' : '' }}
                        >
                            {{ $medico->nome }} (CRM: {{ $medico->crm }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Campo de Paciente --}}
            <div class="mb-3">
                <label for="paciente_id" class="form-label">Paciente</label>
                <select name="paciente_id" id="paciente_id" class="form-select" required>
                    <option value="" disabled>Selecione um paciente</option>
                    @foreach ($pacientes as $paciente)
                        <option 
                            value="{{ $paciente->id }}"
                            {{ old('paciente_id', $atendimento->paciente_id) == $paciente->id ? 'selected' : '' }}
                        >
                            {{ $paciente->nome }} (CPF: {{ $paciente->cpf }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Botões de ação --}}
            <div class="d-flex justify-content-end mx-auto">
                <button type="submit" class="btn btn-primary mx-1">Salvar</button>
                <a href="{{ route('atendimentos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
