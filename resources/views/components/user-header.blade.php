<header>
    <div style="display: flex">
        <h1>Benvenuto {{ auth()->user()->username }}!</h1>

        <nav style="display: flex">
            <form action="/home/books" method="GET">
                @csrf
                <button>Catalogo</button>
            </form>
            
            <form action="/home/loans" method="GET">
                @csrf
                <button>I miei prestiti</button>
            </form>

            <form action="/home/profile" method="GET">
                @csrf
                <button>Il mio profilo</button>
            </form>

            @if(auth()->user()->isAdmin)
            <a href="/dashboard">Vai alla dashboard</a>
            @endif

            <form action="/logout" method="POST">
                @csrf
                <button>Log out</button>
            </form>
        </nav>
    </div>
</header>