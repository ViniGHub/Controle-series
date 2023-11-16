<form action=" {{ $action }} " method="POST">
    @csrf
    @if ($update)
        @method('PUT')
    @endif

    <div class="my-3">
        <label for="nome" class="form-label text-light">Nome da Série</label>
        <input type="text" id="nome" name="name" placeholder="Digite o nome da série aqui" class="form-control"
            @isset($name)
                value="{{ $name }}"
            @endisset
            >
    </div>
    <div class="my-3">
        <label for="" class="form-label text-light">Cor do Titulo</label>
        <input type="color" name="color" id="color" class="form-control" value="{{ $color }}">

    </div>

    <button class="btn btn-dark">Enviar</button>
</form>
