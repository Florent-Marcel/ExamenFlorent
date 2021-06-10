<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'une représentation</h2>
    </x-slot>

    @if (! empty ($reservation))
        <article>
            <h1>Réservation {{ $reservation->id }} </h1>
            <ul><strong>Utilisateur : {{ $reservation->user->login }} </strong></ul>
            <ul>Nombre de places : {{$reservation->places}}</ul>
            <ul>Spectacle : {{ $reservation->representation->show->title}}</ul>
            @if ($reservation->representation->location != NULL)
                <ul>Designation : {{ $reservation->representation->location->designation}}</ul>
                <ul>Adresse : {{ $reservation->representation->location->locality->postal_code}}</ul>
                <ul>Commune : {{ $reservation->representation->location->locality->locality}}</ul>
            @else
                <td>Aucune désignation</td>
                <td></td>
                <td></td>
            @endif
        </article>
    @else
        <h1>Il n'y a pas de réservation</h1>
    @endif
    <br/>
    <nav><a class="hover:text-blue-600" href="{{ route('reservation_index') }}">Retour à l'index</a></nav>
</x-app-layout>
