<x-app-layout>
    <h2>departamento - {{ $departamento->nome }}</h2>


    <div class="card">
        <form class="card-form" action="{{ route('departamentos.destroy', ['departamento' => $departamento->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="DELETE" class="input-field">
            <button id="button">Deletar</button>




    </div>

</x-app-layout>