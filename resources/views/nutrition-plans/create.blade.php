@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Nuevo Plan Nutricional</h2>
    <form action="{{ route('nutrition-plans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Plan</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear Plan</button>
    </form>
</div>
@endsection
