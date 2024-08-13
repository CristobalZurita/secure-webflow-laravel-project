@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Reportes y Estadísticas</h2>
    <ul class="report-list">
        @foreach($reports as $report)
        <li>
            <h3>{{ $report->title }}</h3>
            <p>{{ Str::limit($report->description, 100) }}</p>
            <a href="{{ route('reports.show', $report->id) }}" class="btn btn-primary">Ver Reporte</a>
        </li>
        @endforeach
    </ul>
</div>
@endsection
