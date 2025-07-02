@props(['data' => null])

<div class="rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 m-2 w-xl bg-white">
    <h2 class="text-center text-indigo-600 font-bold text-xl py-4">Aggiungi una copia </h2>

    <form action="/dashboard/add-copy" method="POST">
        @csrf
        <div class="mb-2">
            <label for="book_id">
                <span class="text-sm font-medium text-gray-700"> Libro </span>

                <select name="book_id" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm p-2">
                    <option value="" selected disabled>Seleziona...</option>

                    @foreach($data as $book)
                    <option value="{{$book->id}}">{{$book->author}} - {{$book->title}}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <div class="mb-2">
            <label for="condition">
                <span class="text-sm font-medium text-gray-700"> Codizione </span>

                <select name="condition" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm p-2">
                    <option value="" selected disabled>Seleziona...</option>

                    
                    <option value="good">Ottima</option>
                    <option value="mid">Buona</option>
                    <option value="bad">Accettabile</option>
                </select>
            </label>
        </div>

        <div class="mb-2">
            <label for="available">
                <span class="text-sm font-medium text-gray-700"> Disponibile </span>

                <select name="available" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm p-2">
                    <option value="1" selected>Si</option>
                    <option value="0">No</option>
                </select>
            </label>
        </div>

        <label for="notes">
            <span class="text-sm font-medium text-gray-700"> Note </span>
            <textarea name="notes" class="mt-0.5 w-full resize-none rounded border-gray-300 shadow-sm sm:text-sm px-2 py-1" rows="4"></textarea>
        </label>

        <x-main-button>Aggiungi</x-main-button>
    </form>
</div>