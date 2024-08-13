@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Paciente</h1>
    
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $patient->email }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="phone" name="phone" value="{{ $patient->phone }}">
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $patient->birth_date }}">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Género</label>
            <select class="form-control" id="gender" name="gender">
                <option value="male" {{ $patient->gender == 'male' ? 'selected' : '' }}>Masculino</option>
                <option value="female" {{ $patient->gender == 'female' ? 'selected' : '' }}>Femenino</option>
                <option value="other" {{ $patient->gender == 'other' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Altura (cm)</label>
            <input type="number" class="form-control" id="height" name="height" value="{{ $patient->height }}">
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Peso (kg)</label>
            <input type="number" step="0.1" class="form-control" id="weight" name="weight" value="{{ $patient->weight }}">
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notas</label>
            <textarea class="form-control" id="notes" name="notes" rows="3">{{ $patient->notes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection