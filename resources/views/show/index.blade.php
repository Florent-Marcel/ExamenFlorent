<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="{{ URL::asset('js/dataTables.js')}}"></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <h1>Liste des spectacles</h1>
    </x-slot>
    <table id="table" class="display">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Prix</th>
                <th>Nombre de représentations</th>
            </tr>
        </thead>
        <tbody>
        @foreach($shows as $show)
            <tr>
                <td>
                    <a class="hover:text-blue-600" href="{{ route('show_show', $show->id) }}">{{ $show->title }}</a>
                </td>
                <td>
                    @if($show->bookable)
                        <span> {{ $show->price }} € </span>
                    @else
                        <span>Aucun</span>
                    @endif
                </td>
                <td>
                    <span>{{ $show->representations->count() }}</span>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Titre</th>
                <th>Prix</th>
                <th>Nombre de représentations</th>
            </tr>
        </tfoot>
    </table>
</x-app-layout>

