@props(['data' => null])

<div>
    <h2>Prestiti in corso</h2>

    @if(!$data)
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
        @foreach($data as $copy)
        <tr>
            <td>{{ $copy->title }}</td>
            <td>{{ $copy->author }}</td>
            <td>{{ $copy->year }}</td>
            <td>{{ $copy->condition }}</td>
            <td>{{ \Carbon\Carbon::parse($copy->borrowed_at)->locale('it')->translatedFormat('d F Y') }}</td>
            <td>
                <form action="/home/stop-loan/{{ $copy->copyId }}" method="POST">
                    @csrf
                    <button>Restituisci</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
</div>