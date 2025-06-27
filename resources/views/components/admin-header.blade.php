<header>
    <div style="display: flex;">
        <h1>Admin dashboard</h1>

        <nav>
            <a href="{{ route('list', 'books') }}"><button>Libri</button></a>
            <a href="{{ route('list', 'copies') }}"><button>Copie</button></a>
            <a href="{{ route('list', 'loans') }}"><button>Prenotazioni</button></a>
            <a href="{{ route('list', 'users') }}"><button>Utenti</button></a>   
            <a href="{{ route('add', 'book') }}"><button>Aggiungi libro</button></a>  
            <a href="{{ route('add', 'copy') }}"><button>Aggiungi copia</button></a>   
        </nav>

        <form action="/home" method="GET" class="inline">
            @csrf
            <button>Torna alla home</button>
        </form>

        <form action="/logout" method="POST" class="inline">
            @csrf
            <button>Log out</button>
        </form>
    </div>
</header>