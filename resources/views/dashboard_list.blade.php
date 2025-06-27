<x-layout>
    <h1>Admin dashboard</h1>

    <div style="display: flex;">
        <a href="{{ route('list', 'books') }}"><button>Libri</button></a>
        <a href="{{ route('list', 'copies') }}"><button>Copie</button></a>
        <a href="{{ route('list', 'loans') }}"><button>Prenotazioni</button></a>
        <a href="{{ route('list', 'users') }}"><button>Utenti</button></a>   
    </div>

    @if($table === 'books')
        <h2>Libri censiti</h2>

        {{-- Check wether any loans are ongoing for current user --}}
        @if(!$data)
        <h4>Nessun libro nel sistema!</h4>

        @else
        <table>
            <tr>
                <th>ISBN</th>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Editore</th>
                <th>Anno</th>
                <th>Descrizione</th>
            </tr>
            @foreach($data as $book)
            <tr>
                <th>{{ $book->isbn }}</th>              
                <th>{{ $book->title }}</th>       
                <th>{{ $book->author }}</th>
                <th>{{ $book->publisher }}</th>
                <th>{{ $book->year }}</th>
                <th>{{ $book->description }}</th>
            </tr>
            @endforeach
        </table>
        @endif

    @elseif($table === 'copies')
        <h2>Copie</h2>

        {{-- Check wether any loans are ongoing for current user --}}
        @if(!$data)
        <h4>Nessuna copia nel sistema!</h4>

        @else
        <table>
            <tr>
                <th>Barcode</th>
                <th>ISBN</th>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Editore</th>
                <th>Anno</th>
                <th>Condizione</th>
                <th>Disponibile</th>
            </tr>
            @foreach($data as $copy)
            <tr>
                <th>{{ $copy->copyId }}</th>  
                <th>{{ $copy->isbn }}</th>              
                <th>{{ $copy->title }}</th>       
                <th>{{ $copy->author }}</th>
                <th>{{ $copy->publisher }}</th>
                <th>{{ $copy->year }}</th>
                <th>{{ $copy->condition }}</th>
                <th>{{ $copy->available ? 'Si' : 'No' }}</th>
            </tr>
            @endforeach
        </table>
        @endif

    @elseif($table === 'loans')
        <h2>Prestiti in corso</h2>

        {{-- Check wether any loans are ongoing for current user --}}
        @if(!$data)
        <h4>Nessun prestito in corso!</h4>

        @else
        <table>
            <tr>
                <th>Barcode</th>
                <th>Utente</th>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Anno</th>
                <th>Condizione</th>
                <th>Inizio prestito</th>
            </tr>
            @foreach($data as $copy)
            <tr>
                <th>{{ $copy->copyId    }}</th>              
                <th>{{ $copy->username }}</th>       
                <th>{{ $copy->title }}</th>
                <th>{{ $copy->author }}</th>
                <th>{{ $copy->year }}</th>
                <th>{{ $copy->condition }}</th>
                <th>{{ \Carbon\Carbon::parse($copy->borrowed_at)->locale('it')->translatedFormat('d F Y') }}</th>
            </tr>
            @endforeach
        </table>
        @endif

    @elseif($table === 'users')

    @endif

    <form action="/home" method="GET">
        @csrf
        <button>Torna alla home</button>
    </form>

    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>
</x-layout>