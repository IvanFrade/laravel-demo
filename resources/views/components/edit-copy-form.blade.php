@props(['copy'])

<div class="rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 m-2 w-xl bg-white">
    <h2 class="text-center text-indigo-600 font-bold text-xl py-4">Modifica copia</h2>
    
    <form action="{{ route('copies.edit', $copy->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label for="condition">
                <span class="text-sm font-medium text-gray-700">Condizione</span>
                <select name="condition" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm p-2" required>
                    <option value="ottima" 
                    @if($copy->condition == 'ottima') selected @endif>
                    Ottima</option>

                    <option value="buona" 
                    @if($copy->condition == 'buona') selected @endif>
                    Buona</option>

                    <option value="accettabile" 
                    @if($copy->condition == 'accettabile') selected @endif>
                    Accettabile</option>
                </select>
            </label>
        </div>

        <div class="mb-2">
            <label for="available">
                <span class="text-sm font-medium text-gray-700">Disponibile</span>
                <select name="available" class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm p-2">
                    <option value="1" 
                    @if($copy->available) selected @endif>
                    Disponibile</option>

                    <option value="0" 
                    @if(!$copy->available) selected @endif>
                    Prenotata</option>
                </select>
            </label>
        </div>

        <div class="mb-2">
            <label for="notes">
                <span class="text-sm font-medium text-gray-700">Note</span>
                <textarea name="notes" class="mt-0.5 w-full resize-none rounded border-gray-300 shadow-sm sm:text-sm px-2 py-1" rows="2">{{ old('notes', $copy->notes) }}</textarea>
            </label>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-800 font-semibold">Salva modifiche</button>
        </div>
    </form>
</div>
