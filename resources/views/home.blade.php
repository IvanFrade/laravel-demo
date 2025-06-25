<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Benvenuto {{ auth()->user()->username }}!</h1>

    @if(auth()->user()->isAdmin)
    <a href="">Vai alla dashboard</a>
    @endif
    
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    <div>
        <h2>Prestiti in corso</h2>

        {{-- Check wether any loans are ongoing for current user --}}
        @if(!$currentlyLoanedCopies)
        <h4>Nessun prestito in corso!</h4>

        @else
        <table>
            <tr>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Anno</th>
                <th>Condizione</th>
                <th>Inizio prestito</th>
            </tr>
            @foreach($currentlyLoanedCopies as $copy)
            <tr>
                <th>{{ $copy->title }}</th>
                <th>{{ $copy->author }}</th>
                <th>{{ $copy->year }}</th>
                <th>{{ $copy->condition }}</th>
                <th>{{ \Carbon\Carbon::parse($copy->borrowed_at)->locale('it')->translatedFormat('d F Y') }}</th>
                <th>
                    <form action="/stop-loan/{{ $copy->copyId }}" method="POST">
                        @csrf
                        <button>Restituisci</button>
                    </form>
                </th>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
    <div>
        <h2>Copie prenotabili</h2>

        {{-- Check wether any copies are available to borrow --}}
        @if(!$availableCopies)
        <h4>Nessuna copia disponibile per il prestito!</h4>

        @else
        <table>
            <tr>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Anno</th>
                <th>Condizione</th>
                <th>Disponibile</th>
            </tr>
            @foreach($availableCopies as $copy)
            <tr>
                <th>{{ $copy->title }}</th>
                <th>{{ $copy->author }}</th>
                <th>{{ $copy->year }}</th>
                <th>{{ $copy->condition }}</th>
                <th>{{ $copy->available }}</th>
                <th>
                    <form action="/start-loan/{{ $copy->copyId }}" method="POST">
                        @csrf
                        <button>Prenota</button>
                    </form>
                </th>
            </tr>
            @endforeach
        </table>
        @endif
    </div>
</body>
</html>