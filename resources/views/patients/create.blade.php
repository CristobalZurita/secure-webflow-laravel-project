@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Nuevo Paciente</h1>
    
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="tel" class="form-control" id="phone" name="phone">
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="birth_date" name="birth_date">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Género</label>
            <select class="form-control" id="gender" name="gender">
                <option value="male">Masculino</option>
                <option value="female">Femenino</option>
                <option value="other">Otro</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="height" class="form-label">Altura (cm)</label>
            <input type="number" class="form-control" id="height" name="height">
        </div>
        <div class="mb-3">
            <label for="weight" class="form-label">Peso (kg)</label>
            <input type="number" step="0.1" class="form-control" id="weight" name="weight">
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notas</label>
            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('patients.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection