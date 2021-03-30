@extends('layouts.app')


@section('title', 'Fiche d\'un artiste')

@section('content')
    @if (! empty ($artist))
      <h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>
      <nav><a href="{{ route('artist_index') }}">Retour à l'index</a></nav>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
@endsection

