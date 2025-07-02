@props(['data' => null])

<div class="rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 m-2 w-xl bg-white">
    <h2 class="text-center text-indigo-600 font-bold text-xl py-4">Aggiungi un libro </h2>

    <form action="/add-book" method="POST">
        @csrf
        <label for="isbn">
            <span class="text-sm font-medium text-gray-700">Codice ISBN</span>
            <input type="text" name="isbn" placeholder="" 
            class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
        </label>

        <label for="title">
            <span class="text-sm font-medium text-gray-700">Titolo</span>
            <input type="text" name="title" placeholder="" 
            class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
        </label>

        <label for="author">
            <span class="text-sm font-medium text-gray-700">Autore</span>
            <input type="text" name="author" placeholder="" 
            class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
        </label>

        <label for="publisher">
            <span class="text-sm font-medium text-gray-700">Editore</span>
            <input type="text" name="publisher" placeholder="" 
            class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
        </label>

        <label for="year">
            <span class="text-sm font-medium text-gray-700">Anno</span>
            <input type="text" name="year" placeholder="" 
            class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
        </label>

        <label for="description">
            <span class="text-sm font-medium text-gray-700"> Descrizione </span>
            <textarea name="description" class="mt-0.5 w-full resize-none rounded border-gray-300 shadow-sm sm:text-sm px-2 py-1" rows="4"></textarea>
        </label>

        <div class="mb-2">
            <label for="genre_id">
                <span class="text-sm font-medium text-gray-700"> Genere </span>

                <select name="genre_id" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm p-2">
                    <option value="" selected disabled>Seleziona...</option>

                    @foreach($data as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <x-main-button>Aggiungi</x-main-button>
    </form>
</div>