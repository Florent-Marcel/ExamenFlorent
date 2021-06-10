<x-app-layout>
    <x-slot name="header">
        <h1>Liste des {{ $resource }}</h1>
    </x-slot>
    <table>
        <thead>
            <tr>
                <th>Réservations</th>
                <th>Dates</th>
                <th>Shows</th>
                <th>Locations</th>
                <th>CP</th>
                <th>Localité</th>
                <th>Utilisateur</th>
                <th>Places réservées</th>
            </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <td><a class="hover:text-blue-600" href="{{ route('reservation_show', $reservation->id) }}">{{ $reservation->id}}
                <td>{{ $reservation->representation->when }}</a></td>
                <td>{{ $reservation->representation->show->title}}</td>
                @if ($reservation->representation->location != NULL)
                    <td>{{ $reservation->representation->location->designation}}</td>
                    <td>{{ $reservation->representation->location->locality->postal_code}}</td>
                    <td>{{ $reservation->representation->location->locality->locality}}</td>
                @else
                    <td>Aucune désignation</td>
                    <td></td>
                    <td></td>
                @endif
                <td><a class="hover:text-blue-600" href="{{ route('reservation_show', $reservation->user_id) }}">{{ $reservation->user->login }} </a></td>
                <td>{{ $reservation->places }} </td>

            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
