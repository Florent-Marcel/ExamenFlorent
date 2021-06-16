<x-app-layout>
    <x-slot name="header">
        <h2>Modifier un role</h2>
    </x-slot>
    @if(!empty($role) and Auth::user()->isAdmin())
        <form action="{{route('role_update', $role->id)}}"  method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="role">Role</label>
                <input type="text" id="role" name="role"
                @if (old('role'))
                    value="{{old('role')}}"
                @else
                    value="{{$role->role}}"
                @endif
                    class="@error('role') is-invalid @enderror">
                @error('role')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div>
            <br><button class="shadow w-32 border-blue-600 border-2 rounded-full px-4 py-2 text-blue-600 hover:bg-blue-600 hover:text-white">Confirmer</button>
            <a class="shadow w-32 border-blue-600 border-2 rounded-full px-4 py-2 text-blue-600 hover:bg-blue-600 hover:text-white" href="{{route('role_show',$role->id)}}" >Annuler</a>
        </form>
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
    @elseif(!Auth::user()->isAdmin())
        <p>
            Vous n'avez pas l'autorisation pour voir cette page
        </p>
    @else
        <p>
            Le role n'existe pas
        </p>
    @endif
    <nav><a class="hover:text-blue-600" href="{{ route('role_index') }}">Retour à l'index</a></nav>
</x-app-layout>
