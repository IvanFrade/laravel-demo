@props(['data' => null])

<div class="mx-auto max-w-screen-xl items-center">
    <h2 class="text-center text-indigo-600 font-bold text-3xl py-4">Copie prenotabili</h2>

    @if(!$data)
    <h4 class="text-center text-indigo-600 font-bold text-2xl py-4">Nessuna copia disponibile per il prestito!</h4>

    @else
    <div class="overflow-x-auto overflow-y-auto rounded border border-gray-300 shadow-sm m-5 md:max-h-[80vh]">
        <table class="min-w-full divide-y-2 divide-gray-200 table-fixed text-center">
            <thead class="ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-gray-900 text-center">
                    <th class="px-3 py-2 whitespace-nowrap w-[35%]">Titolo</th>
                    <th class="px-3 py-2 whitespace-nowrap w-[30%]">Autore</th>
                    <th class="px-3 py-2 whitespace-nowrap w-[10%]">Anno</th>
                    <th class="px-3 py-2 whitespace-nowrap w-[15%]">Condizione</th>
                    <th class="px-3 py-2 whitespace-nowrap w-[10%]"></th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
            @foreach($data as $copy)
                <tr class="*:text-gray-900 *:first:font-medium">
                    <td class="px-3 py-2 whitespace-nowrap">{{ $copy->title }}</td>
                    <td class="px-3 py-2 whitespace-nowrap">{{ $copy->author }}</td>
                    <td class="px-3 py-2 whitespace-nowrap">{{ $copy->year }}</td>
                    <td class="px-3 py-2 whitespace-nowrap">{{ ucfirst($copy->condition) }}</td>
                    <td class="px-3 py-2 whitespace-nowrap">
                        <form class="block rounded-md bg-indigo-600 px-5 py-2.5 text-sm font-medium text-white transition hover:bg-indigo-800 max-w-25 text-center" 
                        action="/start-loan/{{ $copy->copyId }}" method="POST">
                            @csrf
                            <button>Prenota</button>
                        </form>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>