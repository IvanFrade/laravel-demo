<x-layout>
    <div class="flex flex-col h-screen">
    <x-admin-header />

    <main class="flex flex-col flex-1 bg-indigo-900 justify-center items-center">
        @if($el === 'genre')
        <x-add-genre />

        @elseif($el === 'book')
        <x-add-book :data="$data" />

        @elseif($el === 'copy')
        <x-add-copy :data="$data" />

        @endif
    </main>
    </div>
</x-layout>