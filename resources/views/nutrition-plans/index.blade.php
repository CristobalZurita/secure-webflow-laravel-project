@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Planes Nutricionales</h2>
    <ul class="plan-list">
        @foreach($plans as $plan)
        <li>
            <h3>{{ $plan->name }}</h3>
            <p>{{ $plan->description }}</p>
            <a href="{{ route('nutrition-plans.show', $plan->id) }}" class="btn btn-primary">Ver Detalles</a>
        </li>
        @endforeach
    </ul>
    <a href="{{ route('nutrition-plans.create') }}" class="btn btn-primary">Crear Nuevo Plan</a>
</div>
@endsection
