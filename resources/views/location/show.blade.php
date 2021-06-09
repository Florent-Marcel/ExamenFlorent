<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'une localité</h2>
    </x-slot>

    @if (! empty ($location))
        <article>
            <h1 class="text-xl font-bold">{{$location->designation}}</h1>
            <br/>
            <address>
                <p>{{ $location->address }}</p>
                <p>
                    {{ $location->locality->postal_code }}
                    {{ $location->locality->locality }}
                </p>

                @if ($location->website)
                    <p><a href="{{ $location->website }}" target="_blank">{{ $location->website }}</a></p>
                @else
                    <p>Pas de site web</p>
                @endif

                @if ($location->phone)
                    <p><a href="tel:{{ $location->phone }}">{{ $location->phone }}</a></p>
                @else
                    <p>Pas de téléphone</p>
                @endif
            </address>
            <br/>
            <h2 class="text-lg">Liste des spectacles</h2>
            <ul>
                @if($location->shows->count() > 0)
                    @foreach ($location->shows as $show)
                        <li>{{ $show->title }}</li>
                    @endforeach
                @else
                    Aucun
                @endif
            </ul>
        </article>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
    <br/>
    <nav><a class="hover:text-blue-600" href="{{ route('location_index') }}">Retour à l'index</a></nav>
</x-app-layout>
