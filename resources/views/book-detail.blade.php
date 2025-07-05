<x-layout>

<x-user-header />
<div class="mx-auto max-w-2xl py-8">
    <a href="/home/books" class="inline-block mb-6 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">Torna al catalogo</a>
    <div class="flex flex-col md:flex-row gap-8 items-center">
        <div class="w-full md:w-1/3 flex-shrink-0">
            <div class="aspect-[2/3] bg-gray-100 flex items-center justify-center overflow-hidden rounded shadow">
                <img src="{{ $book->cover_image ?? asset('img/default.png') }}" alt="Copertina di {{ $book->title }}" class="h-full w-auto object-cover">
            </div>
        </div>
        <div class="w-full md:w-2/3">
            <h1 class="text-3xl font-bold text-indigo-700 mb-2">{{ $book->title }}</h1>
            <h2 class="text-xl text-gray-700 mb-4">di {{ $book->author }}</h2>
            <div class="mb-2"><span class="font-semibold">Anno:</span> {{ $book->year }}</div>
            <div class="mb-2"><span class="font-semibold">Genere:</span> {{ $book->genre->name ?? '-' }}</div>
            <div class="mb-2"><span class="font-semibold">ISBN:</span> {{ $book->isbn ?? '-' }}</div>
            <div class="mb-2"><span class="font-semibold">Descrizione:</span> {{ $book->description ?? '-' }}</div>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-2xl font-semibold text-indigo-600 mb-4">Copia migliore disponibile</h3>
        @if($bestCopy)
            <div class="bg-white rounded shadow p-4 flex flex-col md:flex-row items-center gap-6">
                <div class="flex-1">
                    <div><span class="font-semibold">Barcode:</span> {{ $bestCopy->id }}</div>
                    <div><span class="font-semibold">Condizione:</span> {{ ucfirst($bestCopy->condition) }}</div>
                    <div><span class="font-semibold">Note:</span> {{ $bestCopy->notes ?? '-' }}</div>
                </div>
                <form action="/start-loan/{{ $bestCopy->id }}" method="POST">
                    @csrf
                    <button class="block rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-800">Prenota</button>
                </form>
            </div>
        @else
            <div class="text-gray-500">Nessuna copia disponibile per il prestito.</div>
        @endif
    </div>
</div>

</x-layout>