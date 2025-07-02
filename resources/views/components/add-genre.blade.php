<div class="rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 m-2 w-xl bg-white">
    <h2 class="text-center text-indigo-600 font-bold text-xl py-4">Aggiungi un genere </h2>

    <form action="/dashboard/add-genre" method="POST">
        @csrf
        <label for="name">
            <span class="text-sm font-medium text-gray-700">Genere</span>
            <input type="text" name="name" placeholder="" 
            class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
        </label>

        <label for="description">
            <span class="text-sm font-medium text-gray-700"> Descrizione </span>
            <textarea name="description" class="mt-0.5 w-full resize-none rounded border-gray-300 shadow-sm sm:text-sm px-2 py-1" rows="4"></textarea>
        </label>

        <x-main-button>Aggiungi</x-main-button>
    </form>
</div>