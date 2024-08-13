@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Calendario de Citas</h1>
    <div id="calendar"></div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: '/api/appointments', // Asume que tienes una ruta API para obtener las citas
        eventClick: function(info) {
            // Maneja el clic en un evento (cita)
            alert('Cita: ' + info.event.title);
        },
        dateClick: function(info) {
            // Maneja el clic en una fecha
            window.location.href = '/appointments/create?date=' + info.dateStr;
        }
    });
    calendar.render();
});
</script>
@endpush