<x-layout>

    <x-admin-header />

    @if($el === 'genre')
    <div style="border: 3px solid black;">
        <h2>Aggiungi un genere</h2>
        <form action="/add-genre" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Genere">
            <textarea name="description" placeholder="Descrizione"></textarea>
            <button>Aggiungi</button>
        </form>
    </div>

    @elseif($el === 'book')
    <div style="border: 3px solid black;">
        <h2>Aggiungi un libro</h2>
        <form action="/add-book" method="POST">
            @csrf
            <input type="text" name="isbn" placeholder="Codice ISBN">
            <input type="text" name="title" placeholder="Titolo">
            <input type="text" name="author" placeholder="Autore">
            <input type="text" name="publisher" placeholder="Editore">
            <input type="text" name="year" placeholder="Anno">
            <textarea name="description" placeholder="Descrizione"></textarea>
            <select name="genre_id">
                @foreach($data as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
            <button>Aggiungi</button>
        </form>
    </div>

    @elseif($el === 'copy')
    <div style="border: 3px solid black;">
        <h2>Aggiungi una copia</h2>
        <form action="/add-copy" method="POST">
            @csrf
            <select name="book_id">
                @foreach($data as $book)
                    <option value="{{$book->id}}">{{$book->author}} - {{$book->title}}</option>
                @endforeach
            </select>
            <select name="condition" >
                <option value="good">Ottima</option>
                <option value="mid">Buona</option>
                <option value="bad">Accettabile</option>
            </select>
            <select name="available" >
                <option value='1'>Si</option>
                <option value='0'>No</option>
            </select>
            <textarea name="notes" placeholder="Note..."></textarea>
            <button>Aggiungi</button>
        </form>
    </div>
    @endif
</x-layout>