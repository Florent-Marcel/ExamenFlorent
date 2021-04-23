<x-app-layout>
    <x-slot name="header">
        <h1>Liste des {{ $resource }}</h1>
    </x-slot>
    <table>
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
            </tr>
        </thead>
        <tbody>
        @foreach($artists as $artist)
            <tr>
                <td>
                    <div>
                        <a class="hover:text-blue-600" href="{{ route('artist_show', $artist->id) }}">{{ $artist->lastname }}</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


</x-app-layout>
