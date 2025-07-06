<x-layout>
    <x-user-header />

    @if(session('success'))
        <div id="success-message" class="px-4 py-2 bg-green-200 text-green-800 rounded-md my-4 text-center w-[80%] mx-auto">
            {{ session('success') }}
        </div>
        
        <script>
            setTimeout(function() {
                var msg = document.getElementById('success-message');
                if (msg) msg.style.display = 'none';
            }, 3000);
        </script>
    @endif

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