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
                <td>{{ $book->isbn }}</td>              
                <td>{{ $book->title }}</td>       
                <td>{{ $book->author }}</td>
                <td>{{ $book->publisher }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->description }}</td>
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
                <td>{{ $copy->copyId }}</td>  
                <td>{{ $copy->isbn }}</td>              
                <td>{{ $copy->title }}</td>       
                <td>{{ $copy->author }}</td>
                <td>{{ $copy->publisher }}</td>
                <td>{{ $copy->year }}</td>
                <td>{{ $copy->condition }}</td>
                <td>{{ $copy->available ? 'Disponibile' : 'Prenotata' }}</td>
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
                <td>{{ $copy->copyId    }}</td>              
                <td>{{ $copy->username }}</td>       
                <td>{{ $copy->title }}</td>
                <td>{{ $copy->author }}</td>
                <td>{{ $copy->year }}</td>
                <td>{{ $copy->condition }}</td>
                <td>{{ \Carbon\Carbon::parse($copy->borrowed_at)->locale('it')->translatedFormat('d F Y') }}</td>
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
                <td>{{ $user->id }}</td>              
                <td>{{ $user->username }}</td>       
                <td>{{ $user->email }}</td>
                <td>{{ $user->isAdmin ? "Si" : "No" }}</td>
                <td>{{ \Carbon\Carbon::parse($user->created_at)->locale('it')->translatedFormat('d F Y') }}</td>
            </tr>
            @endforeach
        </table>
    @endif


</x-layout>