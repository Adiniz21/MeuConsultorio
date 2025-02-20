@extends('layout')

@section('content')
    <h1 class="mb-4">Novo Paciente</h1>

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

        <form action="{{ route('pacientes.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input 
                    type="text" 
                    name="nome" 
                    id="nome" 
                    class="form-control" 
                    value="{{ old('nome') }}" 
                    placeholder="Insira o nome do paciente"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input 
                    type="text" 
                    name="cpf" 
                    id="cpf" 
                    class="form-control" 
                    value="{{ old('cpf') }}" 
                    placeholder="Insira o CPF (apenas números)"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                <input 
                    type="date" 
                    name="data_nascimento" 
                    id="data_nascimento" 
                    class="form-control"
                    value="{{ old('data_nascimento') }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control" 
                    value="{{ old('email') }}" 
                    placeholder="Insira o e-mail do paciente"
                    required
                >
            </div>

            <div class="d-flex justify-content-end mx-auto">
                <button type="submit" class="btn btn-primary mx-1">Salvar</button>
                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
