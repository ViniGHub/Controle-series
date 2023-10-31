<x-layout title="Adicionar Série">

    <form action=" {{ route('series.store') }} " method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome da Série</label>
                <input autofocus type="text" id="name" name="name" placeholder="Digite o nome da série aqui"
                    class="form-control" value="{{ old('name') }}">
            </div>

            <div class="col-2">
                <label for="season" class="form-label text-white">Temporada</label>
                <input type="number" id="season" name="season"
                    placeholder="N° de Temporadas" class="form-control"
                    value="{{ old('season') }}">
            </div>

            <div class="col-2">
                <label for="episode" class="form-label">Episodio</label>
                <input type="number" id="episode" name="episode"
                    placeholder="Episode por temp." class="form-control"
                    value="{{ old('episode') }}">
            </div>

        </div>
        <button class="btn btn-dark">Enviar</button>
    </form>
</x-layout>
