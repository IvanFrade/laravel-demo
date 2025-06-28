<x-layout>
    <div class="rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 m-2 w-xl bg-white">
        <form action="/register" method="POST">
            @csrf
            <label for="username">
                <span class="text-sm font-medium text-gray-700"> Username </span>
                <input type="text" name="username" placeholder="" 
                class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
            </label>
            
            <label for="email">
                <span class="text-sm font-medium text-gray-700"> Email </span>
                <input type="text" name="email" placeholder="" 
                class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
            </label> 

            <label for="password">
                <span class="text-sm font-medium text-gray-700"> Password </span>
                <input type="password" name="password" placeholder="" 
                class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
            </label>
            
            <label for="password-confirm">
                <span class="text-sm font-medium text-gray-700"> Confirm password </span>
                <input type="password" name="password-confirm" placeholder="" 
                class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
            </label>

            <button 
            class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden mt-2">
            Registrati
            </button>
        </form>
    </div>

    <div class="rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 m-2 w-xl bg-white">
        <form action="/login" method="POST">
            @csrf
            <label for="username">
                <span class="text-sm font-medium text-gray-700"> Username </span>
                <input type="text" name="username" placeholder="" 
                class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
            </label>

            <label for="password">
                <span class="text-sm font-medium text-gray-700"> Password </span>
                <input type="password" name="password" placeholder="" 
                class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
            </label>
            
            <button 
            class="inline-block rounded-sm border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:ring-3 focus:outline-hidden mt-2">
            Login
            </button>
        </form>
    </div>
</x-layout>