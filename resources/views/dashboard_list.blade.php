<x-layout>    
    <x-admin-header />

    @if($table === 'books')
    <x-list-books :data="$data" />

    @elseif($table === 'copies')
    <x-list-copies :data="$data" />
        
    @elseif($table === 'loans')
    <x-list-loans :data="$data" />

    @elseif($table === 'users')
    <x-list-users :data="$data" />

    @endif
</x-layout>