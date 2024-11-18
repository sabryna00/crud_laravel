<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Funcionário</title>
    <link href="/css/editar.css" rel="stylesheet" type="text/css" />
</head>

<body>
    @if (session()->has('message'))
        <p>{{ session()->get('message') }}</p>
    @endif

    <div class="container">
        <form class="card-form" action="{{ route('funcionarios.update', ['funcionario' => $funcionario->id]) }}"
            method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <!-- Campo Nome -->
            <label for="nome" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Nome" value="{{ $funcionario->nome }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">

            <!-- Campo Email -->
            <label for="email" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" value="{{ $funcionario->email ?? '' }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">

            <!-- Campo Telefone -->
            <label for="telefone"
                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Telefone</label>
            <input type="text" name="telefone" id="telefone" placeholder="Telefone"
                value="{{ $funcionario->telefone ?? '' }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">

            <!-- Seleção de Departamento -->
            <label for="departamento_id"
                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Departamento</label>
            <select name="departamento_id" id="departamento_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Selecione o Departamento</option>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" {{ $funcionario->departamento_id == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->nome }}
                    </option>
                @endforeach
            </select>

            <!-- Seleção de Cargo -->
            <label for="cargo_id"
                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Cargo</label>
            <select name="cargo_id" id="cargo_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Selecione o Cargo</option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}" {{ $funcionario->cargo_id == $cargo->id ? 'selected' : '' }}>
                        {{ $cargo->nome }}
                    </option>
                @endforeach
            </select>

            <!-- Seleção de Turno -->
            <label for="turno_id"
                class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2 mt-4">Turno</label>
            <select name="turno_id" id="turno_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                <option value="">Selecione o Turno</option>
                @foreach ($turnos as $turno)
                    <option value="{{ $turno->id }}" {{ $funcionario->turno_id == $turno->id ? 'selected' : '' }}>
                        {{ $turno->nome }}
                    </option>
                @endforeach
            </select>

            <!-- Botão de Atualização -->
            <div class="action mt-6">
                <button type="submit"
                    class="action-button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
</body>

</html>