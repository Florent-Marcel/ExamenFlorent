<x-app-layout>
    <x-slot name="header">
        <h2>Modifier un artiste</h2>
    </x-slot>
    @if (! empty ($artist))
        <form action="{{route('artist_update', $artist->id)}}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname"
                @if (old('firstname'))
                    value="{{ old('firstname') }}"
                @else
                    value="{{ $artist->firstname}}"
                @endif
                    class="@error('firstname') is-invalid @enderror">
                @error('firstname')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="lastame">Nom</label>
                <input type="text" id="lastname" name="lastname"
                @if (old('lastname'))
                    value="{{ old('lastname') }}"
                @else
                    value="{{ $artist->lastname}}"
                @endif
                    class="@error('lastname') is-invalid @enderror">
                @error('lastname')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div>
                <BR><BR><button>Modifier</button>
                <a class="hover:text-blue-600" href="{{route('artist_show',$artist->id)}}" >Annuler</a>
        </form>
    @endif
    @if ($errors->any())
        <div class="alert allert-danger">
            <h2>Liste des erreurs de validation</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error}} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <nav><a class="hover:text-blue-600" ref="{{ route('artist_index') }}">Retour à l'index</a></nav>

</x-app-layout>
