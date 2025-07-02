@props(['data' => null])

<h2 class="text-center text-gray-300 font-bold text-3xl py-4">Prenotazioni in corso </h2>

@if(!$data)
<h4 class="text-center text-gray-300 font-bold text-2xl py-4">Nessuna prenotazione in corso!</h4>

@else
<div class="overflow-x-auto overflow-y-auto rounded border border-gray-300 shadow-sm m-5 md:max-h-[80vh] bg-gray-200">
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