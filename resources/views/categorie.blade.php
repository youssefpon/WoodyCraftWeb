@extends('layouts.woody')

@section('title', $categorie.' – WoodyCraft')

@section('content')
    @php
        $couleurs = ['#0F5C5A', '#B4462B', '#3B4E8C', '#E3A82B'];
        $piece = '<svg viewBox="0 0 100 100" aria-hidden="true"><path fill="currentColor" d="M10 10h30a10 10 0 1 1 20 0h30v30a10 10 0 1 0 0 20v30H60a10 10 0 1 0-20 0H10V60a10 10 0 1 1 0-20z"/></svg>';
    @endphp

    <h2 class="section">{{ $categorie }}</h2>
    <p style="color: var(--mut); margin-top: -8px">
        {{ $puzzles->count() }} puzzle{{ $puzzles->count() > 1 ? 's' : '' }}
        · <a href="{{ route('home') }}">Accueil</a>
    </p>

    <div class="grid">
        @forelse ($puzzles as $puzzle)
            @php $c = $couleurs[$loop->index % count($couleurs)]; @endphp
            <div class="pc">
                <div class="im" style="background: {{ $c }}1f; color: {{ $c }}">{!! $piece !!}</div>
                <div class="t">
                    <h3>{{ $puzzle->nom }}</h3>
                    <small>{{ $puzzle->description }}</small>
                    <div class="price">{{ number_format($puzzle->prix, 2, ',', ' ') }} €</div>
                </div>
            </div>
        @empty
            <p>Aucun puzzle ici pour le moment.</p>
        @endforelse
    </div>
@endsection