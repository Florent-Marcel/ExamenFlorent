@extends('layouts.app')

@section('title', 'Fiche d\'un artiste')

@section('content')
    @if ($artist != null)
        <h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>
        <nav><a href="{{ route('artist_index') }}"->Retour à l'index</a></nav>
    @else
    <h1>Artiste pas trouvé</h1>
    @endif
@endsection
