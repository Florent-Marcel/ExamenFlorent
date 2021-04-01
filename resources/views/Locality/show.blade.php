@extends('layouts.app')


@section('title', 'Fiche d\'une localité')

@section('content')
    @if (! empty ($locality))
      <h1>{{ $locality->locality }} {{ $locality->locality }}</h1>
      <nav><a href="{{ route('locality_index') }}">Retour à l'index</a></nav>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
@endsection

