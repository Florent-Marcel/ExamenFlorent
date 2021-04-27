<x-app-layout>
    <x-slot name="header">
        <h1>Liste des spectacles</h1>
    </x-slot>
    <ul>
        @foreach($shows as $show)
            <li>
                <a class="hover:text-blue-600" href="{{ route('show_show', $show->id) }}">{{ $show->title }}</a>
                @if($show->bookable)
                    <span> {{ $show->price }} € </span>
                @endif

                @if($show->representations->count()==1)
                    <span>1 représentation</span>
                @elseif($show->representations->count()>1)
                    <span>{{ $show->representations->count() }} représentations</span>
                @else
                    <em>aucune représentation</em>
                @endif
            </li>
        @endforeach
    </ul>
</x-app-layout>

