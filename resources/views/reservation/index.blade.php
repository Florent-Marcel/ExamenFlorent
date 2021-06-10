<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ URL::asset('js/dataTables.js')}}"></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <h1>Liste des {{ $resource }}</h1>
    </x-slot>
    <table id="table" class="display">
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
                <td class="text-left"><a class="hover:text-blue-600" href="{{ route('reservation_show', $reservation->id) }}">{{ $reservation->id}}
                <td class="text-left">{{ $reservation->representation->when }}</a></td>
                <td class="text-left">{{ $reservation->representation->show->title}}</td>
                @if ($reservation->representation->location != NULL)
                    <td class="text-left">{{ $reservation->representation->location->designation}}</td>
                    <td class="text-left">{{ $reservation->representation->location->locality->postal_code}}</td>
                    <td class="text-left">{{ $reservation->representation->location->locality->locality}}</td>
                @else
                    <td class="text-left">Aucune désignation</td>
                    <td class="text-left"></td>
                    <td class="text-left"></td>
                @endif
                <td class="text-left"><a class="hover:text-blue-600" href="{{ route('reservation_show', $reservation->user_id) }}">{{ $reservation->user->login }} </a></td>
                <td class="text-left">{{ $reservation->places }} </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
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
        </tfoot>
    </table>
</x-app-layout>
