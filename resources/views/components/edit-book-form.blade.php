@props(['book'])

<div class="rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 m-2 w-xl bg-white">
    <h2 class="text-center text-indigo-600 font-bold text-xl py-4">Modifica libro</h2>
    
    <form action="{{ route('books.edit', $book->id) }}" method="POST" enctype="multipart/form-data">
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

        <label
            for="cover_image"
            class="flex flex-row items-center justify-center gap-4 rounded border border-gray-300 p-4 text-gray-900 shadow-sm sm:p-6"
            >
            <div class="flex flex-col items-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="size-6"
                >
                    <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m0-3-3-3m0 0-3 3m3-3v11.25m6-2.25h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75"
                    />
                </svg>

                <span class="mt-4 font-medium"> Copertina </span>

                <span
                    class="mt-2 inline-block rounded border border-gray-200 bg-gray-50 px-3 py-1.5 text-center text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-100"
                >
                    Sfoglia
                </span>

                <input type="file" name="cover_image" id="cover_image" accept="image/*" class="sr-only" onchange="previewCover(event)" />
            </div>

            <div class="flex flex-col items-center ml-4">
                <img id="cover-preview" src="{{ $book->cover_image }}" alt="Copertina attuale" class="w-24 h-auto rounded shadow @if(!$book->cover_image) hidden @endif">
            </div>
        </label>
        
        <div class="mt-4">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-800 font-semibold">Salva modifiche</button>
        </div>
    </form>
</div>

<script>
function previewCover(event) {
    const [file] = event.target.files;
    const preview = document.getElementById('cover-preview');
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
    } else {
        preview.src = '';
        preview.classList.add('hidden');
    }
}
</script>
