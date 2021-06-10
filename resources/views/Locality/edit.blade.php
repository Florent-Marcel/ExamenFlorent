<x-app-layout>
    <x-slot name="header">
        <h2>Modifier une localité</h2>
    </x-slot>

    @if(!empty($locality) and Auth::user()->isAdmin())
        <form action="{{ route('locality_update', $locality->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for='postal_code'>Code postale</label>
                <input type='text'id="postal_code" name="postal_code"
                @if(old('postal_code'))
                    value="{{ old('postal_code') }}"
                @else
                    value="{{ $locality->postal_code }}"
                @endif
                    class="@error('postal_code') is-invalid @enderror">

                @error('postal_code')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for='locality'>Localité</label>
                <input type='text'id="locality" name="locality"
                @if(old('locality'))
                    value="{{ old('locality') }}"
                @else
                    value="{{ $locality->locality }}"
                @endif
                    class="@error('locality') is-invalid @enderror">

                @error('locality')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br/>
            <button class="shadow w-32 border-blue-600 border-2 rounded-full px-4 py-2 text-blue-600 hover:bg-blue-600 hover:text-white">Modifier</button>
            <a class="shadow w-32 border-blue-600 border-2 rounded-full px-4 py-2 text-blue-600 hover:bg-blue-600 hover:text-white" href="{{ route('locality_show', $locality->id) }}">Annuler</a>
        </form>
        @if($errors->any())
        <div class="alert alert-danger">
            <h2>Liste des erreurs de validation</h2>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
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
            La localité n'existe pas
        </p>
    @endif
    <nav><a class="hover:text-blue-600" href="{{ route('locality_index') }}">Retour à l'index</a></nav>
</x-app-layout>
