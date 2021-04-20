@extends('layouts.app')

@section('title', 'Fiche d\'un role')

@section('content')
    @if (!empty ($role))
        <h1> {{ $role->role}} </h1>
        <nav><a href="{{route('role_index') }}">Retour à l'index</a></nav>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
@endsection
