<x-app-layout>
    <x-slot name="header">
        <h1>Liste des {{ $resource }}</h1>
    </x-slot>
    <table>
        @foreach($representations as $representation)
            <tr>
                <td><a class="hover:text-blue-600" href="{{ route('representation_show', $representation->id) }}">{{ $representation->show->title }}</a></td>
                <td>
                @if($representation->location)
                    <span>{{ $representation->location->designation }}</span>
                @endif
                </td>
                <td><datetime> {{ substr($representation->when,0,-3) }}</datetime></td>
                @if ($representation->show->bookable)
                    <td><a class="hover:text-blue-600" href="{{ route('representation_book',$representation->id)}}">Réserver</a></td>
                @endif
            </tr>
        @endforeach
        </td>
</x-app-layout>

