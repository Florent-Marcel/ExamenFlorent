
<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'une localité</h2>
    </x-slot>

    @if (! empty ($locality))
      <h1 class="text-xl font-bold">{{ $locality->postal_code }} {{ $locality->locality }}</h1>

      <ul>
          @foreach($locality->locations as $location)
            <li>{{ $location->designation }}</li>
          @endforeach
      </ul>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
    <br/>
    @if(Auth::user() != null and Auth::user()->isAdmin)
        <div><a class="hover:text-blue-600" href="{{ route('locality_edit', $locality->id) }}">Modifier</a></div>
    @endif
    <nav><a class="hover:text-blue-600" href="{{ route('locality_index') }}">Retour à l'index</a></nav>
</x-app-layout>
