<header class="bg-gray-300">
    <div class="mx-auto flex h-16 max-w-screen-xl items-center gap-8 px-4 sm:px-6 lg:px-8">
    
        <a class="block text-indigo-600" href="/home">
        <span class="sr-only">Home</span>
        <svg class="h-8" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm8 0h2v12H4V2h4v5h2V2z" fill="indigo" />
        </svg>
        </a>

        <div class="flex flex-1 items-center justify-end md:justify-between">
            <nav aria-label="Global" class="hidden md:block">
                <ul class="flex items-center gap-6 text-sm">
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('dashboard', 'list-books') }}">Libri</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('dashboard', 'list-copies') }}">Copie</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('dashboard', 'list-loans') }}">Prenotazioni</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('dashboard', 'list-users') }}">Utenti</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('dashboard', 'add-genre') }}">Aggiungi genere</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('dashboard', 'add-book') }}">Aggiungi libro</a>
                    </li>
                    <li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('dashboard', 'add-copy') }}">Aggiungi copia</a>
                    </li><li>
                        <a class="text-gray-500 transition hover:text-gray-500/75" href="{{ route('home', 'books') }}">Torna alla home</a>
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