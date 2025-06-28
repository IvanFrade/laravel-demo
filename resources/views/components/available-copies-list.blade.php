@props(['data' => null])

<div>
    <h2>Copie prenotabili</h2>

    @if(!$data)
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
        @foreach($data as $copy)
        <tr>
            <td>{{ $copy->title }}</td>
            <td>{{ $copy->author }}</td>
            <td>{{ $copy->year }}</td>
            <td>{{ $copy->condition }}</td>
            <td>{{ $copy->available }}</td>
            <td>
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