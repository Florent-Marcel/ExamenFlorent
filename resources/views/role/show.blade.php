<x-app-layout>
    <x-slot name="header">
        <h2>Fiche d'un role</h2>
    </x-slot>
    <p>
        @if (!empty ($role))
            <h1 class="text-xl font-bold"> {{ $role->role}} </h1>

            @if($role->users->count() > 0)
                @foreach ($role->users as $user)
                    {{ $user->login }} <br/>
                @endforeach
            @else
                Aucun
            @endif
        @else
            <h1>Il n'y a pas d'enregistrement </h1>
        @endif
    </p>
    <br/>
    <nav><a class="hover:text-blue-600" href="{{route('role_index') }}">Retour à l'index</a></nav>
</x-app-layout>
