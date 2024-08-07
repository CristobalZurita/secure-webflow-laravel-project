@extends('layouts.app')

@section('title', 'Inicio - Nutribite')

@section('content')
    @include('partials.home')
    @include('partials.nosotros')
    @include('partials.especialistas')
    @include('partials.planes')
    @include('partials.promociones')
    @include('partials.contacto')
@endsection
