<x-layout>    
    <x-admin-header />

    @if($table === 'books')
        <h2 class="text-center text-indigo-600 font-bold text-3xl py-4">Libri censiti</h2>

        @if(!$data)
        <h4 class="text-center text-indigo-600 font-bold text-2xl py-4">Nessun libro nel sistema!</h4>

        @else
        <div class=" wrap-anywhere overflow-x-auto overflow-y-auto rounded border border-gray-300 shadow-sm m-5 md:max-h-[80vh]">
            <table class="min-w-full divide-y-2 divide-gray-200 table-fixed text-center">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900 text-center">
                        <th class="px-3 py-2 whitespace-nowrap w-[20%]">ISBN</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[20%]">Titolo</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[10%]">Autore</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[10%]">Editore</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[10%]">Anno</th>
                        <th class="px-3 py-2 whitespace-normal break-words w-[30%]">Descrizione</th>
                    </tr>
                </thead>
 
                <tbody class="divide-y divide-gray-200">
                    @foreach($data as $book)
                    <tr class="*:text-gray-900 *:first:font-medium">
                        <td class="px-3 py-2 whitespace-nowrap">{{ $book->isbn }}</td>              
                        <td class="px-3 py-2 whitespace-nowrap">{{ $book->title }}</td>       
                        <td class="px-3 py-2 whitespace-nowrap">{{ $book->author }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $book->publisher }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $book->year }}</td>
                        <td class="px-3 py-2 whitespace-normal break-words">{{ $book->description }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

    @elseif($table === 'copies')
        <h2 class="text-center text-indigo-600 font-bold text-3xl py-4">Copie </h2>

        @if(!$data)
        <h4 class="text-center text-indigo-600 font-bold text-2xl py-4">Nessuna copia nel sistema!</h4>

        @else
        <div class="overflow-x-auto overflow-y-auto rounded border border-gray-300 shadow-sm m-5 md:max-h-[80vh]">
            <table class="min-w-full divide-y-2 divide-gray-200 table-fixed text-center">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900 text-center">
                        <th class="px-3 py-2 whitespace-nowrap w-[7%]">Barcode</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[7%]">ISBN</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[20%]">Titolo</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[20%]">Autore</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[15%]">Editore</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[5%]">Anno</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[8%]">Condizione</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[8%]">Disponibile</th>
                    </tr>
                </thead>
                
                <tbody class="divide-y divide-gray-200">
                    @foreach($data as $copy)
                    <tr class="*:text-gray-900 *:first:font-medium">
                        <td class="px-3 py-2 whitespace-nowrap">{{ $copy->copyId }}</td>  
                        <td class="px-3 py-2 whitespace-nowrap">{{ $copy->isbn }}</td>              
                        <td class="px-3 py-2 whitespace-nowrap">{{ $copy->title }}</td>       
                        <td class="px-3 py-2 whitespace-nowrap">{{ $copy->author }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $copy->publisher }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $copy->year }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $copy->condition }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $copy->available ? 'Disponibile' : 'Prenotata' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    @elseif($table === 'loans')
        <h2 class="text-center text-indigo-600 font-bold text-3xl py-4">Prenotazioni in corso </h2>

        @if(!$data)
        <h4 class="text-center text-indigo-600 font-bold text-2xl py-4">Nessuna prenotazione in corso!</h4>

        @else
        <div class="overflow-x-auto overflow-y-auto rounded border border-gray-300 shadow-sm m-5 md:max-h-[80vh]">
            <table class="min-w-full divide-y-2 divide-gray-200 table-fixed text-center">
                <thead class="ltr:text-left rtl:text-right">
                    <tr class="*:font-medium *:text-gray-900 text-center">
                        <th class="px-3 py-2 whitespace-nowrap w-[10%]">Barcode</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[10%]">Utente</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[20%]">Titolo</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[20%]">Autore</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[1%]">Anno</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[10%]">Condizione</th>
                        <th class="px-3 py-2 whitespace-nowrap w-[20%]">Inizio prestito</th>
                    </tr>
                </thead>
            
                <tbody class="divide-y divide-gray-200">
                    @foreach($data as $loan)
                    <tr class="*:text-gray-900 *:first:font-medium">
                        <td class="px-3 py-2 whitespace-nowrap">{{ $loan->copyId }}</td>              
                        <td class="px-3 py-2 whitespace-nowrap">{{ $loan->username }}</td>       
                        <td class="px-3 py-2 whitespace-nowrap">{{ $loan->title }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $loan->author }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $loan->year }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ $loan->condition }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ \Carbon\Carbon::parse($loan->borrowed_at)->locale('it')->translatedFormat('d F Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

    @elseif($table === 'users')
        <h2 class="text-center text-indigo-600 font-bold text-3xl py-4">Utenti registrati </h2>

        <div class="overflow-x-auto overflow-y-auto rounded border border-gray-300 shadow-sm m-5 md:max-h-[80vh]">
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
                        <td class="px-3 py-2 whitespace-nowrap">{{ $user->isAdmin ? "Si" : "No" }}</td>
                        <td class="px-3 py-2 whitespace-nowrap">{{ \Carbon\Carbon::parse($user->created_at)->locale('it')->translatedFormat('d F Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif


</x-layout>