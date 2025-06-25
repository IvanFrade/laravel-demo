<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <div>
        <h2>Prestiti in corso</h2>
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
    </div>
    <div>
        <h2>Copie prenotabili</h2>
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
    </div>
</body>
</html>