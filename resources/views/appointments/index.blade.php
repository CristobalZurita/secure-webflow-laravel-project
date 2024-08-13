@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Citas</h1>
    <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">Nueva Cita</a>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Paciente</th>
                <th>Tipo</th>
                <th>Motivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->date->format('d/m/Y') }}</td>
                <td>{{ $appointment->time->format('H:i') }}</td>
                <td>{{ $appointment->patient->name }}</td>
                <td>{{ $appointment->type }}</td>
                <td>{{ $appointment->reason }}</td>
                <td>
                    <a href="{{ route('appointments.show', $appointment->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Cancelar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $appointments->links() }}
</div>
@endsection