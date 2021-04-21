@extends('layouts.app')

@section('title', 'Liste des localités')

@section('content')
    <h1>Liste des {{ $resource }}</h1>

    <table>
        <thead>
            <tr>
                <th>Localités</th>
                <th>Code Postal</th>
            </tr>
        </thead>
        <tbody>
        @foreach($localities as $locality)
            <tr>
                <td>{{ $locality->locality }}</td>
                <td>
                    <a href="{{ route('locality_show', $locality->id) }}">{{ $locality->postal_code }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

