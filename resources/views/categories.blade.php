@extends('layouts.woody')

@section('title', 'Catégories – WoodyCraft')

@section('content')
    @php $couleurs = ['#0F5C5A', '#B4462B', '#3B4E8C', '#E3A82B']; @endphp

    <h2 class="section">Toutes les catégories</h2>

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
@endsection