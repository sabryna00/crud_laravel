<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 font-sans text-gray-900 dark:text-gray-100">

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6 shadow-md">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="flex justify-center items-center min-h-screen">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 max-w-sm w-full">
            <h2 class="text-2xl font-semibold text-center text-gray-800 dark:text-gray-100 mb-6">Editar Departamento</h2>

            <form action="{{ route('departamentos.update', ['departamento' => $departamento->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">

                <div class="mb-4">
                    <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
                    <input type="text" name="nome" id="nome" value="{{ $departamento->nome }}"
                        class="mt-2 block w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-gray-900 dark:text-gray-100 dark:bg-gray-700"
                        required>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="w-full py-2 px-4 bg-gray-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                        Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>