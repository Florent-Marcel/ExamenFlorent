<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'une représentation</h2>
    </x-slot>
    @if (! empty ($representation))
    <article>
        <form action="{{ route('reservation_book', $representation->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <h1>Représentation du {{ $date }} à {{ $time }}</h1>
                <p><strong>Spectacle:</strong> {{ $representation->show->title }}</p>
                <p></p>
                <strong>Lieu:</strong>
                @if($representation->location)
                    {{ $representation->location->designation }}
                @elseif ($representation->show->location)
                    {{ $representation->show->location->designation}}
                @else
                    <em>à déterminer</em>
                @endif
            </div>
            <div>
                <label for='places'>Nombre de places souhaitées</label>
                <input type='number' min="1" id="places" name="places"
                @if(old('places'))
                    value="{{ old('places')}}"

                @endif
                    class="@error('places') is-invalid @enderror">
                @error('places')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br/>
            <button class="shadow w-32 border-blue-600 border-2 rounded-full px-4 py-2 text-blue-600 hover:bg-blue-600 hover:text-white">Réserver</button>
            <a class="shadow w-32 border-blue-600 border-2 rounded-full px-4 py-2 text-blue-600 hover:bg-blue-600 hover:text-white" href="{{ route('representation_index', $representation->id) }}">Annuler</a>

        </form>
    </article>
@else
    <h1>Il n'y a pas d'enregistrement </h1>
@endif
<br/>
<nav><a class="hover:text-blue-600" href="{{ route('representation_index') }}">Retour à l'index</a></nav>

</x-app-layout>
