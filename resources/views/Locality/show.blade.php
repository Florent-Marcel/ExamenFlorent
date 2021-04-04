
<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'une localité</h2>
    </x-slot>

    @if (! empty ($locality))
      <h1>{{ $locality->locality }} {{ $locality->locality }}</h1>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
    <nav><a class="hover:text-blue-600" href="{{ route('locality_index') }}">Retour à l'index</a></nav>
</x-app-layout>
