@props(['data' => null])

<h2 class="text-center text-gray-300 font-bold text-3xl py-4">Libri censiti</h2>

@if(!$data)
<h4 class="text-center text-gray-300 font-bold text-2xl py-4">Nessun libro nel sistema!</h4>

@else
<div class=" wrap-anywhere overflow-x-auto overflow-y-auto rounded border border-gray-300 shadow-sm m-5 md:max-h-[80vh] bg-gray-200">
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