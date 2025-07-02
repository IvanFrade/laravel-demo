@props(['data' => null])

<h2 class="text-center text-gray-300 font-bold text-3xl py-4">Utenti registrati </h2>

<div class="overflow-x-auto overflow-y-auto rounded border border-gray-300 shadow-sm m-5 md:max-h-[80vh] bg-gray-200">
    <table class="min-w-full divide-y-2 divide-gray-200 table-fixed text-center">
        <thead class="ltr:text-left rtl:text-right">
            <tr class="*:font-medium *:text-gray-900 text-center">
                <th class="px-3 py-2 whitespace-nowrap w-[10%]">ID</th>
                <th class="px-3 py-2 whitespace-nowrap w-[25%]">Username</th>
                <th class="px-3 py-2 whitespace-nowrap w-[25%]">Email</th>
                <th class="px-3 py-2 whitespace-nowrap w-[15%]">Admin</th>
                <th class="px-3 py-2 whitespace-nowrap w-[25%]">Data creazione</th>
            </tr>
        </thead>
        
        <tbody class="divide-y divide-gray-200">
            @foreach($data as $user)
            <tr class="*:text-gray-900 *:first:font-medium">
                <td class="px-3 py-2 whitespace-nowrap">{{ $user->id }}</td>              
                <td class="px-3 py-2 whitespace-nowrap">{{ $user->username }}</td>       
                <td class="px-3 py-2 whitespace-nowrap">{{ $user->email }}</td>
                <td class="px-3 py-2 whitespace-nowrap">{{ $user->hasRole('admin') ? "Si" : "No" }}</td>
                <td class="px-3 py-2 whitespace-nowrap">{{ \Carbon\Carbon::parse($user->created_at)->locale('it')->translatedFormat('d F Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>