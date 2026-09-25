<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Éditer un puzzle') }}
        </h2>
    </x-slot>

    <x-puzzles-card>

        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ route('puzzles.update', $puzzle->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nom -->
            <div>
                <x-input-label for="nom" :value="__('Nom')" />
                <x-text-input
                    id="nom"
                    class="block mt-1 w-full"
                    type="text"
                    name="nom"
                    :value="old('nom', $puzzle->nom)"
                    required
                    autofocus
                />
                <x-input-error :messages="$errors->get('nom')" class="mt-2" />
            </div>

            <!-- Catégorie -->
            <div>
                <x-input-label for="categorie" :value="__('Catégorie')" />
                <x-text-input
                    id="categorie"
                    class="block mt-1 w-full"
                    type="text"
                    name="categorie"
                    :value="old('categorie', $puzzle->categorie)"
                    required
                />
                <x-input-error :messages="$errors->get('categorie')" class="mt-2" />
            </div>

            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <x-text-input
                    id="description"
                    class="block mt-1 w-full"
                    type="text"
                    name="description"
                    :value="old('description', $puzzle->description)"
                    required
                />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <!-- Image -->
            <div>
                <x-input-label for="image" :value="__('Image')" />
                <x-text-input
                    id="image"
                    class="block mt-1 w-full"
                    type="text"
                    name="image"
                    :value="old('image', $puzzle->image)"
                    required
                />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <!-- Prix -->
            <div>
                <x-input-label for="prix" :value="__('Prix')" />
                <x-text-input
                    id="prix"
                    class="block mt-1 w-full"
                    type="number"
                    name="prix"
                    :value="old('prix', $puzzle->prix)"
                    required
                />
                <x-input-error :messages="$errors->get('prix')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Modifier') }}
                </x-primary-button>
            </div>

        </form>

    </x-puzzles-card>
</x-app-layout>
