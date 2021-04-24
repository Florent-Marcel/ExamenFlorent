<x-app-layout>
    <x-slot name="header">
        <h1>Liste des spectacles</h1>
    </x-slot>
    <ul>
        @foreach($shows as $show)
            <li>
                <a href="{{ route('show_show', $show->id) }}">{{ $show->title }}</a>
                @if($show->bookable)
                    <span> {{ $show->price }} € </span>
                @endif
            </li>
        @endforeach
    </ul>
</x-app-layout>

