<x-layout>
    <x-user-header />
    
    <main class="flex flex-col h-screen bg-indigo-900 justify-center items-center">
        @if($view === 'books')
        <x-available-copies-list :data="$data" />
        @endif

        @if($view === 'loans')    
        <x-user-ongoing-loans :data="$data" />
        @endif

        @if($view === 'profile')
        <p>Il mio profilo</p>
        @endif

    </main>    
</x-layout>