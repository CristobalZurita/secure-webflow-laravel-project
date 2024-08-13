@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mensajes</h2>
    <ul class="message-list">
        @foreach($messages as $message)
        <li>
            <a href="{{ route('messages.show', $message->id) }}">
                <h3>{{ $message->subject }}</h3>
                <p>{{ Str::limit($message->body, 50) }}</p>
                <span>{{ $message->created_at->format('d M Y') }}</span>
            </a>
        </li>
        @endforeach
    </ul>
    <a href="{{ route('messages.create') }}" class="btn btn-primary">Nuevo Mensaje</a>
</div>
@endsection
