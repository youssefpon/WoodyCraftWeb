<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-800">WoodyCraft, puzzles en bois</h1>
    </x-slot>

    <div class="max-w-7xl mx-auto py-8 px-4">

        <h2 class="text-xl font-semibold mb-4">Nos catégories</h2>
        <div class="mb-10">
            @forelse ($categories as $categorie)
                <a href="{{ route('categories.show', $categorie) }}"
                   class="inline-block bg-white border rounded px-4 py-2 mr-2 mb-2 hover:bg-gray-50">
                    {{ $categorie }}
                </a>
            @empty
                <p class="text-gray-500">Aucune catégorie pour le moment.</p>
            @endforelse
        </div>

        <h2 class="text-xl font-semibold mb-4">Nouveautés</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @forelse ($nouveautes as $puzzle)
                <div class="bg-white border rounded p-4">
                    <p class="font-semibold">{{ $puzzle->nom }}</p>
                    <p class="text-sm text-gray-500">{{ $puzzle->categorie }}</p>
                    <p class="mt-2">{{ number_format($puzzle->prix, 2, ',', ' ') }} €</p>
                </div>
            @empty
                <p class="text-gray-500">Aucun puzzle pour le moment.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
