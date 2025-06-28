<header class="bg-gray-300">
    <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8">
    
        <a class="block text-indigo-600" href="/home">
        <span class="sr-only">Home</span>
        <svg class="h-8" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm8 0h2v12H4V2h4v5h2V2z" fill="indigo" />
        </svg>
        </a>

        <div class="relative inline-flex">
            <span
                class="inline-flex divide-x divide-gray-300 overflow-hidden rounded border border-gray-300 bg-white shadow-sm"
            >
                <button
                type="button"
                class="px-3 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative"
                >
                Product
                </button>

                <button
                type="button"
                class="px-3 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900 focus:relative"
                aria-label="Menu"
                >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-4"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
                </button>
            </span>

            <div
                role="menu"
                class="absolute end-0 top-12 z-auto w-56 overflow-hidden rounded border border-gray-300 bg-white shadow-sm"
            >
                <a
                href="#"
                class="block px-3 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900"
                role="menuitem"
                >
                Storefront
                </a>

                <a
                href="#"
                class="block px-3 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900"
                role="menuitem"
                >
                Warehouse
                </a>

                <a
                href="#"
                class="block px-3 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-50 hover:text-gray-900"
                role="menuitem"
                >
                Stock
                </a>

                <button
                type="button"
                class="block w-full px-3 py-2 text-left text-sm font-medium text-red-700 transition-colors hover:bg-red-50"
                >
                Delete
                </button>
            </div>
            </div>

        <div class="flex flex-1 items-center justify-end md:justify-between">
            <nav aria-label="Global" class="hidden md:block">
                <ul class="flex items-center gap-6 text-sm">
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('list', 'books') }}">Libri</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('list', 'copies') }}">Copie</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('list', 'loans') }}">Prenotazioni</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('list', 'users') }}">Utenti</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('add', 'genre') }}">Aggiungi genere</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('add', 'book') }}">Aggiungi libro</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('add', 'copy') }}">Aggiungi copia</a>
                    </li><li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="/home">Torna alla home</a>
                    </li>
                </ul>
            </nav>

            <div class="flex items-center gap-4">
                <div class="sm:flex sm:gap-4">
                    <form class="block rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-800" 
                    action="/logout" method="POST">
                        @csrf 
                        <button>Log out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>