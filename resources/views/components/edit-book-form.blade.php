@props(['book'])

<div class="rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 m-2 w-xl bg-white">
    <h2 class="text-center text-indigo-600 font-bold text-xl py-4">Modifica libro</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="isbn">
            <span class="text-sm font-medium text-gray-700">Codice ISBN</span>
            <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
        </label>
        <label for="title">
            <span class="text-sm font-medium text-gray-700">Titolo</span>
            <input type="text" name="title" value="{{ old('title', $book->title) }}" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" required />
        </label>
        <label for="author">
            <span class="text-sm font-medium text-gray-700">Autore</span>
            <input type="text" name="author" value="{{ old('author', $book->author) }}" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" required />
        </label>
        <label for="publisher">
            <span class="text-sm font-medium text-gray-700">Editore</span>
            <input type="text" name="publisher" value="{{ old('publisher', $book->publisher) }}" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
        </label>
        <label for="year">
            <span class="text-sm font-medium text-gray-700">Anno</span>
            <input type="number" name="year" value="{{ old('year', $book->year) }}" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
        </label>
        <label for="description">
            <span class="text-sm font-medium text-gray-700">Descrizione</span>
            <textarea name="description" class="mt-0.5 w-full resize-none rounded border-gray-300 shadow-sm sm:text-sm px-2 py-1" rows="4">{{ old('description', $book->description) }}</textarea>
        </label>
        <label for="cover_image">
            <span class="text-sm font-medium text-gray-700">Copertina</span>
            <input type="file" name="cover_image" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
            @if($book->cover_image)
                <img src="{{ $book->cover_image }}" alt="Copertina attuale" class="mt-2 w-24 h-auto rounded shadow">
            @endif
        </label>
        <div class="mt-4">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-800 font-semibold">Salva modifiche</button>
        </div>
    </form>
</div>
