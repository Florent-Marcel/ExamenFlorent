@extends('layouts.app')

@section('title', 'Fiche d\'un type')

@section('content')
    @if (!empty ($type))
        <h1> {{ $type->type}} </h1>
        <nav><a href="{{route('type_index') }}">Retour à l'index</a></nav>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
@endsection
