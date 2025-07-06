<x-layout>

<x-admin-header />

<div class="mx-auto max-w-2xl py-8">
    <a href="/dashboard/list-books" class="inline-block mb-6 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">&larr; Torna alla lista</a>
    <h2 class="text-2xl font-bold text-indigo-700 mb-6">
        @if(isset($book))
            Modifica libro
        @elseif(isset($copy))
            Modifica copia
        @endif
    </h2>
    @if(isset($book))
        <x-edit-book-form :book="$book" />
    @elseif(isset($copy) && isset($books))
        <x-edit-copy-form :copy="$copy" :books="$books" />
    @else
        <div class="text-red-600">Elemento non trovato o dati mancanti.</div>
    @endif
</div>

</x-layout>
