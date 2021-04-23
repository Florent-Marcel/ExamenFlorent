<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'une Localité</h2>
    </x-slot>
    @if (! empty ($locality))
      <h1>{{ $locality->locality }} {{ $locality->postal_code }}</h1>
      <ul>
        @foreach($locality->locations as $location)
            <li>{{ $location->designation }}</li>
        @endforeach
        </ul>
      <nav><a href="{{ route('locality_index') }}">Retour à l'index</a></nav>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
</x-app-layout>

