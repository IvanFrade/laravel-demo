@props(['data' => null])

<div class="mx-auto max-w-screen-xl py-8">
    <h2 class="text-center text-indigo-600 font-bold text-3xl py-4">Libri disponibili</h2>
    @if(!$data)
        <h4 class="text-center text-indigo-600 font-bold text-2xl py-4">Nessun libro trovato!</h4>
    @else
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 p-4">
            @foreach($data as $book)
                <a href="/books/{{ $book->id }}" class="block bg-white rounded-lg shadow-md hover:shadow-xl transition overflow-hidden group">
                    <div class="w-full aspect-[2/3] bg-gray-100 flex items-center justify-center overflow-hidden">
                        <img src="{{ $book->cover_image ?? asset('img/default.png') }}" alt="Copertina di {{ $book->title }}" class="h-full w-auto object-cover group-hover:scale-105 transition-transform duration-200">
                    </div>
                    <div class="p-4 text-center">
                        <div class="font-semibold text-lg text-gray-900">{{ $book->title }}</div>
                        <div class="text-gray-600 text-sm mt-1">{{ $book->author }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>
