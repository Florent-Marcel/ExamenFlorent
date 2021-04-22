
<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'un artiste</h2>
    </x-slot>

    @if (! empty ($artist))
      <h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>
      <nav><a href="{{ route('artist_index') }}">Retour à l'index</a></nav>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif

</x-app-layout>
