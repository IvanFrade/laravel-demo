<x-layout>
    
    <x-admin-header />

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
        <h2>Utenti registrati</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Data creazione</th>
            </tr>
            @foreach($data as $user)
            <tr>
                <th>{{ $user->id }}</th>              
                <th>{{ $user->username }}</th>       
                <th>{{ $user->email }}</th>
                <th>{{ $user->isAdmin ? "Si" : "No" }}</th>
                <th>{{ \Carbon\Carbon::parse($user->created_at)->locale('it')->translatedFormat('d F Y') }}</th>
            </tr>
            @endforeach
        </table>
    @endif


</x-layout>