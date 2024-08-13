@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Perfil del Paciente</h1>
    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $patient->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $patient->email }}</p>
            <p class="card-text"><strong>Teléfono:</strong> {{ $patient->phone }}</p>
            <p class="card-text"><strong>Fecha de Nacimiento:</strong> {{ $patient->birth_date }}</p>
            <p class="card-text"><strong>Género:</strong> {{ $patient->gender }}</p>
            <p class="card-text"><strong>Altura:</strong> {{ $patient->height }} cm</p>
            <p class="card-text"><strong>Peso:</strong> {{ $patient->weight }} kg</p>
            <p class="card-text"><strong>IMC:</strong> {{ $patient->bmi }}</p>
            <p class="card-text"><strong>Notas:</strong> {{ $patient->notes }}</p>
        </div>
    </div>
    
    <div class="mt-3">
        <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
</div>
@endsection