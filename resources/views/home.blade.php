<x-layout>
    <x-user-header />
    
    <main>
        @if($view === 'books')
        <x-books-gallery :data="$data" />
        @endif

        @if($view === 'loans')    
        <x-user-ongoing-loans :data="$data" />
        @endif

        @if($view === 'profile')
        <p>Il mio profilo</p>
        @endif

    </main>    
</x-layout>