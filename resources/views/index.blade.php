<x-layout>
    <main class="flex flex-col h-screen bg-indigo-900 justify-center items-center">
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
                    <span class="text-sm font-medium text-gray-700"> Conferma password </span>
                    <input type="password" name="password-confirm" placeholder="" 
                    class="mt-0.5 w-full rounded border-gray-300 shadow-sm sm:text-sm px-2 py-2" />
                </label>

                <x-main-button>Registrati</x-main-button>
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
                
                
                <x-main-button>Login</x-main-button>
            </form>
        </div>
    </main>
</x-layout>