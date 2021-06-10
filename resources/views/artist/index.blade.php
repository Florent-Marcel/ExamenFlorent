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
                <th class="text-left">Firstname</th>
                <th class="text-left">Lastname</th>
            </tr>
        </thead>
        <tbody>
        @foreach($artists as $artist)
            <tr>
                <td class="text-left"><span>{{ $artist->firstname }}</span></td>
                <td class="text-left">
                    <a class="hover:text-blue-600" href="{{ route('artist_show', $artist->id) }}">{{ $artist->lastname }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="text-left">Firstname</th>
                <th class="text-left">Lastname</th>
            </tr>
        </tfoot>
    </table>


</x-app-layout>
