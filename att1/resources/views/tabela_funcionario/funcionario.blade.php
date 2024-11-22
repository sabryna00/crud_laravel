<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Funcionario') }}
        </h2>
    </x-slot>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6 shadow-md">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="py-12">
        <div class="flex justify-center mt-6">
            <a href="{{ route('funcionarios.create') }}"
                class="inline-block px-6 py-2 bg-gray-500 text-white font-bold rounded-lg shadow hover:bg-gray-600 transition">
                Criar Novo Funcionario
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full table-auto text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nome
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telefone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Departamento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cargo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Turno
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ações
                        </th>
                    </thead>

                    <tbody>
                        @foreach ($funcionarios as $funcionario)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $funcionario->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $funcionario->nome }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $funcionario->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $funcionario->telefone }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $funcionario->departamento->nome ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $funcionario->cargo->nome ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $funcionario->turno->nome ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">

                                    <a href="{{ route('funcionarios.edit', ['funcionario' => $funcionario->id]) }}"
                                        class="inline-block px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-lg shadow hover:bg-gray-600 transition">
                                        Editar
                                    </a>
                                    <a href="{{ route('funcionarios.destroy', ['funcionario' => $funcionario->id]) }}"
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