@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Perfil del Especialista</h2>
    <div class="profile-card">
        <img src="{{ asset('images/specialist.jpg') }}" alt="Foto del especialista">
        <h3>{{ $specialist->name }}</h3>
        <p>Especialidad: {{ $specialist->specialty }}</p>
        <p>Experiencia: {{ $specialist->experience }} años</p>
        <p>Descripción: {{ $specialist->description }}</p>
        <a href="{{ route('specialists.edit', $specialist->id) }}" class="btn btn-primary">Editar Perfil</a>
    </div>
</div>
@endsection
