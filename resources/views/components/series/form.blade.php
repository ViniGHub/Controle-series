<form action=" {{ $action }} " method="POST">
    @csrf
    @if ($update)
        @method('PUT')
    @endif

    <div class="my-3">
        <label for="nome" class="form-label">Nome da Série</label>
        <input type="text" id="nome" name="nome" placeholder="Digite o nome da série aqui"
            class="form-control"
            @isset($name)
                value="{{ $name }}"
            @endisset
            >
    </div>
        <button class="btn btn-dark">Enviar</button>
</form>
