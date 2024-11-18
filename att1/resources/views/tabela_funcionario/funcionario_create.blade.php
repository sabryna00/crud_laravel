<x-app-layout>

    <div class="max-w-2xl mx-auto py-12">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Cadastrar</h2>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{ route('funcionarios.store') }}" method="post"
            class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf


            <div class="mb-4">
                <label for="nome" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Nome"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">

                <label for="email"
                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Email</label>
                <input type="email" name="email" id="email" placeholder="Email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">

                <label for="telefone"
                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Telefone</label>
                <input type="text" name="telefone" id="telefone" placeholder="Telefone"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">

                <label for="departamento_id"
                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Departamento</label>
                <select name="departamento_id" id="departamento_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Selecione o Departamento</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
                    @endforeach
                </select>

                <label for="cargo_id"
                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Cargo</label>
                <select name="cargo_id" id="cargo_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Selecione o Cargo</option>
                    @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id }}">{{ $cargo->nome }}</option>
                    @endforeach
                </select>

                <label for="turno_id"
                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Turno</label>
                <select name="turno_id" id="turno_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Selecione o Turno</option>
                    @foreach ($turnos as $turno)
                        <option value="{{ $turno->id }}">{{ $turno->nome }}</option>
                    @endforeach
                </select>



                </select>

                <button type="submit"
                    class="mt-6 w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Adicionar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>