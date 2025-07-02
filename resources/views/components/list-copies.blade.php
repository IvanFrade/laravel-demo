@props(['data' => null])

<h2 class="text-center text-gray-300 font-bold text-3xl py-4">Copie censite</h2>

@if(!$data)
<h4 class="text-center text-gray-300 font-bold text-2xl py-4">Nessuna copia nel sistema!</h4>

@else
<div class="overflow-x-auto overflow-y-auto rounded border border-gray-300 shadow-sm m-5 md:max-h-[80vh] bg-gray-200">
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