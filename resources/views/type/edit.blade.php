<x-app-layout>
    <x-slot name="header">
        <h2>Modifier un type</h2>
    </x-slot>
    @if (!empty ($type))
        <form action="{{route('type_update', $type->id)}}"  method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="type">Type</label>
                <input type="text" id="type" name="type"
                @if (old('type'))
                    value="{{ old('type') }}"
                @else
                    value="{{ $type->type}}"
                @endif
                    class="@error('type') is-invalid @enderror">
                @error('type')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div>
                <BR><BR><button>Modifier</button>
                <a class="hover:text-blue-600" href="{{route('type_show',$type->id)}}" >Annuler</a>
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
</x-app-layout>
