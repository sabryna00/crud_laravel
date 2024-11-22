<x-app-layout>
    <div class="max-w-2xl mx-auto py-12">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Cadastrar</h2>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6 shadow-md">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('turnos.store') }}" method="post"
            class="bg-white dark:bg-gray-800 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="nome" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Nome"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="w-full py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Criar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>