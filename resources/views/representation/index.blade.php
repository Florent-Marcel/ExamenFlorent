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
                <th class="text-left">Titre</th>
                <th class="text-left">Location</th>
                <th class="text-left">Date</th>
                <th class="text-left">Prix</th>
                <th class="text-left">Réservable</th>
                <th class="text-left">Réserver</th>
            </tr>
        </thead>
        <tbody>
            @foreach($representations as $representation)
                <tr>
                    <td class="text-left"><a class="hover:text-blue-600" href="{{ route('representation_show', $representation->id) }}">{{ $representation->show->title }}</a></td>
                    <td class="text-left">
                    @if($representation->location)
                        <span>{{ $representation->location->designation }}</span>
                    @else
                        <span>aucun</span>
                    @endif
                    </td>

                    <td class="text-left"><datetime> {{ substr($representation->when,0,-3) }}</datetime></td>
                    <td class="text-left"><span>{{ $representation->show->price }} €</span></td>
                    <td class="text-left"><span>{{ ($representation->show->bookable== true ) ? "Oui" : "Non"  }} </span></td>
                    <td class:"text-left"><span>
                        @if ($representation->show->bookable)
                            <a class="hover:text-blue-600" href="{{ route('representation_book',$representation->id)}}">Réserver</a>
                        @else
                            <span class="text-left">/</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="text-left">Titre</th>
                <th class="text-left">Location</th>
                <th class="text-left">Date</th>
                <th class="text-left">Prix</th>
                <th class="text-left">Réservable</th>
                <th class="text-left">Réserver</th>
            </tr>
        </tfoot>
    </table>
</x-app-layout>

