<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="display: flex; flex-direction: column; gap: 20px;">
    @auth
    <p>Sei loggato</p>

    <div style="border: 3px solid black;">
        <h2>Create a new post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Post title">
            <textarea name="body" placeholder="Body content"></textarea>
            <button>Save post</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>Aggiungi un genere</h2>
        <form action="/add-genre" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Genere">
            <textarea name="description" placeholder="Descrizione"></textarea>
            <button>Aggiungi</button>
        </form>
    </div>

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
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
            <button>Aggiungi</button>
        </form>
    </div>

    <div style="border: 3px solid black;">
        <h2>Aggiungi una copia</h2>
        <form action="/add-copy" method="POST">
            @csrf
            <select name="book_id">
                @foreach($books as $book)
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

    <div style="border: 3px solid black;">
        <h2>All Posts</h2>
        @foreach($posts as $post)
        <div style="background-color: gray; padding: 10px; margin: 10px;">
            <h3>{{$post['title']}} by {{$post->user->name}}</h3>
            {{$post['body']}}
            <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
            <form action="/delete-post/{{$post->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </div>
        @endforeach
    </div>

    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>

    @else
    <div style="border: 3px solid black; padding: 12px;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="username" placeholder="Username">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="password">
            <button>Register</button>
        </form>
    </div>
    <div style="border: 3px solid black; padding: 12px;">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="login-username" placeholder="Username">
            <input type="password" name="login-psw">
            <button>Log In</button>
        </form>
    </div>
    @endauth
</body>
</html>