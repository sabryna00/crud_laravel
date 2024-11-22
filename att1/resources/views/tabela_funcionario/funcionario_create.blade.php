<x-app-layout>
    <div class="max-w-2xl mx-auto py-12">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Cadastrar</h2>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6 shadow-md">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('funcionarios.store') }}" method="post"
            class="bg-white dark:bg-gray-800 shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-6">
                <label for="nome" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Nome"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-6">
                <label for="email" class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                <input type="email" name="email" id="email" placeholder="Email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-6">
                <label for="telefone"
                    class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Telefone</label>
                <input type="text" name="telefone" id="telefone" placeholder="Telefone"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="mb-6">
                <label for="departamento_id"
                    class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Departamento</label>
                <select name="departamento_id" id="departamento_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">Selecione o Departamento</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}">{{ $departamento->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="cargo_id"
                    class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Cargo</label>
                <select name="cargo_id" id="cargo_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">Selecione o Cargo</option>
                    @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id }}">{{ $cargo->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="turno_id"
                    class="block text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Turno</label>
                <select name="turno_id" id="turno_id"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-800 dark:text-gray-200 bg-white dark:bg-gray-700 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">Selecione o Turno</option>
                    @foreach ($turnos as $turno)
                        <option value="{{ $turno->id }}">{{ $turno->nome }}</option>
                    @endforeach
                </select>
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