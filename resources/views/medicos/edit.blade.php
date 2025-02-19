@extends('layout')

@section('content')
    <h1 class="mb-4">Editar medico #{{ $medico->id }}</h1>

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

        <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input 
                    type="text"
                    name="nome" 
                    id="nome" 
                    class="form-control" 
                    value="{{ old('nome', $medico->nome) }}" 
                    required
                >
            </div>

            <div class="mb-3">
                <label for="crm" class="form-label">CRM (Ex: 123456/SP)</label>
                <input 
                    type="text"
                    name="crm"
                    id="crm"
                    class="form-control"
                    value="{{ old('crm', $medico->crm) }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="especialidade" class="form-label">Especialidade</label>
                <input 
                    type="text"
                    name="especialidade"
                    id="especialidade"
                    class="form-control"
                    value="{{ old('especialidade', $medico->especialidade) }}"
                    required
                >
            </div>

            <div class="d-flex justify-content-end mx-auto">
                <button type="submit" class="btn btn-primary mx-1">Salvar</button>
                <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
