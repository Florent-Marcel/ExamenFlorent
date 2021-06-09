<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'un type</h2>
    </x-slot>
    @if (!empty ($type))
        <h1 class="text-xl font-bold"> {{ $type->type}} </h1>
        <br/>
        <h2 class="text-lg">Liste des artistes</h2>
        <ul>
            @if($type->artists->count() > 0)
                @foreach ($type->artists as $artist)
                    <li>{{ $artist->firstname }} {{ $artist->lastname }}</li>
                @endforeach
            @else
                Aucun
            @endif
        </ul>
        <div><a href="{{ route('type_edit',$type->id)}}">Modifier</a></div>
    @else
        <h1>Il n'y a pas d'enregistrement </h1>
    @endif
    <br/>
    <nav><a class="hover:text-blue-600" href="{{route('type_index') }}">Retour à l'index</a></nav>
</x-app-layout>
