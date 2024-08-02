@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Reservar cita</h2>
    <form id="appointment-form" method="POST" action="{{ route('appointment.schedule') }}">
        @csrf
        <div>
            <label>
                <input type="radio" name="type" value="presencial" checked> Visita presencial
            </label>
            <label>
                <input type="radio" name="type" value="online"> Consulta online
            </label>
        </div>
        <div>
            <label for="reason">Motivo de la visita</label>
            <select id="reason" name="reason" required>
                <option value="">Seleccione un motivo</option>
                <option value="primera_visita">Primera visita Nutrición</option>
                <!-- Añadir más opciones según sea necesario -->
            </select>
        </div>
        <div>
            <label for="date">Fecha</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div id="time-slots">
            <!-- Los slots de tiempo se cargarán aquí dinámicamente -->
        </div>
        <button type="submit">Agendar cita</button>
    </form>
</div>

<script>
document.getElementById('date').addEventListener('change', function() {
    fetch(`/available-slots?date=${this.value}`)
        .then(response => response.json())
        .then(slots => {
            const timeSlots = document.getElementById('time-slots');
            timeSlots.innerHTML = '';
            slots.forEach(slot => {
                const radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'time';
                radio.value = slot;
                radio.id = `time-${slot}`;
                const label = document.createElement('label');
                label.htmlFor = `time-${slot}`;
                label.textContent = slot;
                timeSlots.appendChild(radio);
                timeSlots.appendChild(label);
            });
        });
});
</script>
@endsection