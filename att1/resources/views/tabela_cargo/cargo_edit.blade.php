<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar</title>
    <link href="/css/editar.css" rel="stylesheet" type="text/css" />
</head>

<body>
    @if (session()->has('message'))
        {{ session()->get('message') }}
    @endif


    <div class="container">
            <form class="card-form" action="{{ route('cargos.update', ['cargo' => $cargo->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="input">
                    <input class="input-field" type="text" name="nome" value="{{$cargo->nome}}">
                    <label class="input-label">Nome</label>
                </div>
                <div class="action">
                    <button type="submit" class="action-button">Atualizar</button>
                </div>
            </form>


        </div>
    </div>


</body>

</html>