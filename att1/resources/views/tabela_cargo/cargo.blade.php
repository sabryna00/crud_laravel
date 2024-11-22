<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cargo') }}
        </h2>
    </x-slot>

    <!-- Mensagem de sucesso -->
    @if (session()->has('message'))
        <div
            class="bg-green-500 text-white dark:bg-green-600 dark:text-white px-4 py-3 rounded mb-6 shadow-md flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2l4-4m6 2a9 9 0 11-18 0a9 9 0 0118 0z" />
            </svg>
            <span>{{ session()->get('message') }}</span>
        </div>
    @endif

    <div class="py-12">
        <div class="flex justify-center mt-6">
            <a href="{{ route('cargos.create') }}"
                class="inline-block px-6 py-2 bg-gray-500 text-white font-bold rounded-lg shadow hover:bg-gray-600 transition">
                Criar Novo Cargo
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full table-auto text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left">ID</th>
                            <th scope="col" class="px-6 py-3 text-left">Nome</th>
                            <th scope="col" class="px-6 py-3 text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cargos as $cargo)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $cargo->id }}
                                </th>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    {{ $cargo->nome }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">

                                    <a href="{{ route('cargos.edit', ['cargo' => $cargo->id]) }}"
                                        class="inline-block px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-600 transition">
                                        Editar
                                    </a>
                                    <a href="{{ route('cargos.destroy', ['cargo' => $cargo->id]) }}"
                                        class="inline-block px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-600 transition">
                                        Mostrar
                                    </a>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>