<x-layout>

<x-admin-header />

<div class="mx-auto max-w-2xl py-8">
    @if($errors->any())
        <ul class="px-4 py-2 bg-red-200 rounded-md">
            @foreach ($errors->all() as $error)
                <li class="my-2 text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    @if(isset($book))
        <a href="/dashboard/list-books" class="inline-block mb-6 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">&larr; Torna alla lista</a>

        <h2 class="text-2xl font-bold text-indigo-700 mb-6">Modifica libro</h2>

        <x-edit-book-form :book="$book" />
    @elseif(isset($copy))
        <a href="/dashboard/list-copies" class="inline-block mb-6 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">&larr; Torna alla lista</a>

        <h2 class="text-2xl font-bold text-indigo-700 mb-6">Modifica copia</h2>
        
        <x-edit-copy-form :copy="$copy" />
    @else
        <div class="text-red-600">Elemento non trovato o dati mancanti.</div>
    @endif
</div>

</x-layout>
