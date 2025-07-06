<x-layout>
    <div class="flex flex-col h-screen">
    <x-admin-header />

    <main class="flex flex-col flex-1 bg-indigo-900 justify-center items-center">

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