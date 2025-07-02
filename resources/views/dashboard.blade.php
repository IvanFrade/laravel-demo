<x-layout>
    <div class="flex flex-col h-screen">
    <x-admin-header />

    <main class="flex flex-col flex-1 bg-indigo-900 justify-center items-center">
        @if($el === 'add-genre')
        <x-add-genre />

        @elseif($el === 'add-book')
        <x-add-book :data="$data" />

        @elseif($el === 'add-copy')
        <x-add-copy :data="$data" />

        @elseif($el === 'list-books')
        <x-list-books :data="$data" />

        @elseif($el === 'list-copies')
        <x-list-copies :data="$data" />
            
        @elseif($el === 'list-loans')
        <x-list-loans :data="$data" />

        @elseif($el === 'list-users')
        <x-list-users :data="$data" />

        @endif
    </main>
    </div>
</x-layout>