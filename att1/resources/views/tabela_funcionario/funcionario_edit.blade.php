<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Funcionário</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 min-h-screen flex items-center justify-center p-6">
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6 shadow-md">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg max-w-md w-full p-6">
        <h2 class="text-2xl font-semibold text-gray-300 mb-4 text-center">Editar Funcionário</h2>

        <form action="{{ route('funcionarios.update', ['funcionario' => $funcionario->id]) }}" method="post"
            class="space-y-4">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div>
                <label for="nome"
                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $funcionario->nome }}"
                    class="w-full shadow-sm border rounded-lg px-4 py-2 text-black focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div>
                <label for="email"
                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Email</label>
                <input type="email" name="email" id="email" placeholder="Email" value="{{ $funcionario->email ?? '' }}"
                    class="w-full shadow-sm border rounded-lg px-4 py-2 text-black focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div>
                <label for="telefone"
                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Telefone</label>
                <input type="text" name="telefone" id="telefone" placeholder="Telefone"
                    value="{{ $funcionario->telefone ?? '' }}"
                    class="w-full shadow-sm border rounded-lg px-4 py-2 text-black focus:ring focus:ring-blue-300 focus:outline-none">
            </div>

            <div>
                <label for="departamento_id"
                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Departamento</label>
                <select name="departamento_id" id="departamento_id"
                    class="w-full shadow-sm border rounded-lg px-4 py-2 text-black focus:ring focus:ring-blue-300 focus:outline-none">
                    <option value="">Selecione o Departamento</option>
                    @foreach ($departamentos as $departamento)
                        <option value="{{ $departamento->id }}" {{ $funcionario->departamento_id == $departamento->id ? 'selected' : '' }}>
                            {{ $departamento->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="cargo_id"
                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Cargo</label>
                <select name="cargo_id" id="cargo_id"
                    class="w-full shadow-sm border rounded-lg px-4 py-2 text-black focus:ring focus:ring-blue-300 focus:outline-none">
                    <option value="">Selecione o Cargo</option>
                    @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->id }}" {{ $funcionario->cargo_id == $cargo->id ? 'selected' : '' }}>
                            {{ $cargo->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="turno_id"
                    class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Turno</label>
                <select name="turno_id" id="turno_id"
                    class="w-full shadow-sm border rounded-lg px-4 py-2 text-black focus:ring focus:ring-blue-300 focus:outline-none">
                    <option value="">Selecione o Turno</option>
                    @foreach ($turnos as $turno)
                        <option value="{{ $turno->id }}" {{ $funcionario->turno_id == $turno->id ? 'selected' : '' }}>
                            {{ $turno->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-center mt-6">
                <button type="submit"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded-lg shadow focus:ring focus:ring-gray-300 focus:outline-none transition">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</body>

</html>