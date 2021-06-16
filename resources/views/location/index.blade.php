<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ URL::asset('js/dataTables.js')}}"></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <h1>Liste des lieux de spectacles</h1>
    </x-slot>
    <table id="table" class="display">
        <thead>
            <tr>
                <th class="text-left">Désignation</th>
                <th class="text-left">Site web</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
                <tr>
                    <td class="text-left">
                        <a class="hover:text-blue-600" href="{{ route('location_show', $location->id) }}">{{ $location->designation }}</a>
                    </td>
                    <td class="text-left">
                        @if($location->website)
                            <a class="hover:text-blue-600" href="{{ $location->website }}">{{ $location->website }}</a>
                        @else
                            Aucun
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td>Désignation</td>
                <td>Site web</td>
            </tr>
        </tfoot>
    </table>
</x-app-layout>

