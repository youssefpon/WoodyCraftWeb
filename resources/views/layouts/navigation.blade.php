<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        Accueil
                    </x-nav-link>

                    @auth
                        @if (Auth::user()->role === 'admin')
                            <x-nav-link :href="route('puzzles.index')" :active="request()->routeIs('puzzles.index')">
                                Gérer les puzzles
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6 sm:space-x-4">
                @auth
                    <span class="text-sm text-gray-500">{{ Auth::user()->name }} ({{ Auth::user()->role }})</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm text-gray-700 underline">
                            Se déconnecter
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Se connecter</a>
                    <a href="{{ route('register') }}" class="text-sm text-gray-700 underline">S'inscrire</a>
                @endauth
            </div>
        </div>
    </div>
</nav>