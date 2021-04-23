<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'un artiste</h2>
    </x-slot>
    @if (! empty ($artist))
      <h1>{{ $artist->firstname }} {{ $artist->lastname }}</h1>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
    <nav><a class="hover:text-blue-600" href="{{ route('artist_index') }}">Retour à l'index</a></nav>
</x-app-layout>
