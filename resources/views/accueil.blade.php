@extends('layouts.woody')

@section('content')
    @php
        $couleurs = ['#0F5C5A', '#B4462B', '#3B4E8C', '#E3A82B'];
        $piece = '<svg viewBox="0 0 100 100" aria-hidden="true"><path fill="currentColor" d="M10 10h30a10 10 0 1 1 20 0h30v30a10 10 0 1 0 0 20v30H60a10 10 0 1 0-20 0H10V60a10 10 0 1 1 0-20z"/></svg>';
    @endphp

    <section class="hero">
        <div>
            <h1>Des puzzles en bois, découpés au laser et finis à la main.</h1>
            <p>Chaque pièce s'emboîte avec un petit clic. Choisis un animal, un mécanisme ou un vrai casse-tête.</p>
            @if ($categories->isNotEmpty())
                <p><a class="btn" href="{{ route('categories.show', $categories->first()) }}">Découvrir les puzzles</a></p>
            @endif
        </div>
        <div class="board" aria-hidden="true">
            @foreach (['#E3A82B', '#0F5C5A', '#B4462B', '#3B4E8C', '#B4462B', '#E3A82B'] as $c)
                <span style="color: {{ $c }}">{!! $piece !!}</span>
            @endforeach
        </div>
    </section>

    <h2 class="section">Nos catégories</h2>
    <div class="cats">
        @forelse ($categories as $categorie)
            <a class="cat" style="background: {{ $couleurs[$loop->index % count($couleurs)] }}"
               href="{{ route('categories.show', $categorie) }}">
                <b>{{ $categorie }}</b>
            </a>
        @empty
            <p>Aucune catégorie pour le moment.</p>
        @endforelse
    </div>

    {{-- Les « plus vendus de la semaine » viendront avec les commandes (sprint suivant) --}}
    <h2 class="section">Nouveautés</h2>
    <div class="grid">
        @forelse ($nouveautes as $puzzle)
            @php $c = $couleurs[$loop->index % count($couleurs)]; @endphp
            <div class="pc">
                <div class="im" style="background: {{ $c }}1f; color: {{ $c }}">{!! $piece !!}</div>
                <div class="t">
                    <h3>{{ $puzzle->nom }}</h3>
                    <small>{{ $puzzle->categorie }}</small>
                    <div class="price">{{ number_format($puzzle->prix, 2, ',', ' ') }} €</div>
                </div>
            </div>
        @empty
            <p>Aucun puzzle pour le moment.</p>
        @endforelse
    </div>
@endsection
