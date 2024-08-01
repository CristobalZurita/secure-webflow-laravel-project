@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Recuperar contraseña</h2>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div>
            <label for="email">Correo electrónico</label>
            <input id="email" type="email" name="email" required autofocus>
        </div>
        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
        <button type="submit">Enviar enlace de recuperación</button>
    </form>
</div>
@endsection